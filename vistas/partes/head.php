<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/sala.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/style.css">
    <title><?php echo $pagina;?></title>
  </head>
  <body>
    <script>
      let camera, scene, renderer, water;

const ease = CustomEase.create(
  "custom",
  "M0,0,C0.042,0.224,0.268,0.35,0.524,0.528,0.708,0.656,0.876,0.808,1,1"
);

const playHead1 = { value: 0 };
const playHead2 = { value: 0 };
const playHead3 = { value: 0 };
const tl = gsap.timeline({ repeat: -1, repeatDelay: 1 });
tl.to(playHead1, { value: 1, duration: 3, ease }, 0.3);
tl.to(playHead2, { value: 1, duration: 3, ease }, 0);
tl.to(playHead3, { value: 1, duration: 3, ease }, 0.4);

const path = new THREE.Path();
path.moveTo(0, 40);
path.bezierCurveTo(39.4459, 17.0938, 62.5, 0, 100, 0);
path.bezierCurveTo(137.5, 0, 173.133, 19.1339, 200, 40);
const pathPoints = path.getPoints();

init();
animate();

function init() {
  renderer = new THREE.WebGLRenderer({ antialias: true });
  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setSize(window.innerWidth, window.innerHeight);
  renderer.toneMapping = THREE.ACESFilmicToneMapping;
  document.body.appendChild(renderer.domElement);
  scene = new THREE.Scene();
  camera = new THREE.PerspectiveCamera(
    55,
    window.innerWidth / window.innerHeight,
    1,
    20000
  );
  camera.position.set(
    3.1590873116966085,
    12.558741624242224,
    162.85051507508345
  );
  camera.rotation.x = -0.01571091803028279;
  camera.rotation.y = 0.019393868089754202;
  camera.rotation.z = 0.0003047014328572437;

  water = generateSea(scene);
  addBackground(scene, renderer, water);
  addObjects(scene);

  const controls = new THREE.OrbitControls(camera, renderer.domElement);
  controls.maxPolarAngle = Math.PI * 0.495;
  controls.target.set(0, 10, 0);
  controls.minDistance = 40.0;
  controls.maxDistance = 200.0;
  controls.update();

  window.addEventListener("resize", onWindowResize);
}

function onWindowResize() {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();

  renderer.setSize(window.innerWidth, window.innerHeight);
}

function animate() {
  requestAnimationFrame(animate);
  render();
}

function render() {
  water.material.uniforms["time"].value += 1.0 / 60.0;
  renderer.render(scene, camera);
}

function getCurve(scene, wMin, wMax, hMin, hMax, z) {
  const initialPoints = pathPoints.map(
    ({ x, y }) =>
      new THREE.Vector3(
        map(x, 0, 200, wMin, wMax),
        map(y, 0, 40, hMax, hMin),
        z
      )
  );
  const curve = new THREE.CatmullRomCurve3(initialPoints);
  curve.curveType = "centripetal";
  curve.closed = false;
  return curve;
}

function addObjects(scene) {
  addAmbientLight(scene);
  const curve1 = getCurve(scene, -140, 80, -10, 20, 10);
  const curve2 = getCurve(scene, -100, 100, -15, 25, 30);
  const curve3 = getCurve(scene, -80, 120, -10, 20, 50);
  loadModel(scene, curve1, playHead1);
  loadModel(scene, curve2, playHead2);
  loadModel(scene, curve3, playHead3);
}
function addAmbientLight(scene) {
  const color = 0xffffff;
  const intensity = 0.6;
  const light = new THREE.AmbientLight(color, intensity);
  scene.add(light);
}

function loadModel(scene, curve, ph) {
  const loader = new THREE.GLTFLoader();
  loader.load("https://assets.codepen.io/3685267/dolphin.glb", function (gltf) {
    const mesh = gltf.scene.children[0];
    addPath(scene, mesh, curve, ph);
  });
}

function addPath(scene, mesh, curve, playHead) {
  const { geometry, material } = mesh;
  geometry.rotateZ(-Math.PI * 0.5);
  let numPoints = 511;
  let cPoints = curve.getSpacedPoints(numPoints);
  let cObjects = curve.computeFrenetFrames(numPoints, true);

  let data = [];
  cPoints.forEach((v) => {
    data.push(v.x, v.y, v.z);
  });
  cObjects.binormals.forEach((v) => {
    data.push(v.x, v.y, v.z);
  });
  cObjects.normals.forEach((v) => {
    data.push(v.x, v.y, v.z);
  });
  cObjects.tangents.forEach((v) => {
    data.push(v.x, v.y, v.z);
  });

  let dataArray = new Float32Array(data);

  let tex = new THREE.DataTexture(
    dataArray,
    numPoints + 1,
    4,
    THREE.RGBFormat,
    THREE.FloatType
  );
  tex.magFilter = THREE.NearestFilter;

  let objBox = new THREE.Box3().setFromBufferAttribute(
    geometry.getAttribute("position")
  );
  let objSize = new THREE.Vector3();
  objBox.getSize(objSize);

  const objUniforms = {
    uSpatialTexture: { value: tex },
    uTextureSize: { value: new THREE.Vector2(numPoints + 1, 4) },
    uTime: playHead,
    uLengthRatio: { value: objSize.z / curve.getLength() },
    uObjSize: { value: objSize }
  };

  let objMat = material;
  objMat.onBeforeCompile = (shader) => {
    shader.uniforms = { ...shader.uniforms, ...objUniforms };
    shader.vertexShader =
      `
        uniform sampler2D uSpatialTexture;
        uniform vec2 uTextureSize;
        uniform float uTime;
        uniform float uLengthRatio;
        uniform vec3 uObjSize;
  
        struct splineData {
          vec3 point;
          vec3 binormal;
          vec3 normal;
        };
  
        splineData getSplineData(float t){
          float xstep = 1. / uTextureSize.y;
          float halfStep = xstep * 0.5;
          splineData sd;
          sd.point    = texture2D(uSpatialTexture, vec2(t, xstep * 0. + halfStep)).rgb;
          sd.binormal = texture2D(uSpatialTexture, vec2(t, xstep * 1. + halfStep)).rgb;
          sd.normal   = texture2D(uSpatialTexture, vec2(t, xstep * 2. + halfStep)).rgb;
          return sd;
        }
    ` + shader.vertexShader;
    shader.vertexShader = shader.vertexShader.replace(
      `#include <begin_vertex>`,
      `#include <begin_vertex>
  
        vec3 pos = position;
  
        float wStep = 1. / uTextureSize.x;
        float hWStep = wStep * 0.5;
  
        float d = pos.z / uObjSize.z;
        float t = uTime + (d * uLengthRatio);
        float numPrev = floor(t / wStep);
        float numNext = numPrev + 1.;
        //numNext = numNext > (uTextureSize.x - 1.) ? 0. : numNext;
        float tPrev = numPrev * wStep + hWStep;
        float tNext = numNext * wStep + hWStep;
        //float tDiff = tNext - tPrev;
        splineData splinePrev = getSplineData(tPrev);
        splineData splineNext = getSplineData(tNext);
  
        float f = (t - tPrev) / wStep;
        vec3 P = mix(splinePrev.point, splineNext.point, f);
        vec3 B = mix(splinePrev.binormal, splineNext.binormal, f);
        vec3 N = mix(splinePrev.normal, splineNext.normal, f);
  
        transformed = P + (N * pos.x) + (B * pos.y);
    `
    );
  };
  scene.add(new THREE.Mesh(geometry, objMat));
}

function generateSea(scene) {
  const waterGeometry = new THREE.PlaneGeometry(10000, 10000);

  const water = new THREE.Water(waterGeometry, {
    textureWidth: 512,
    textureHeight: 512,
    waterNormals: new THREE.TextureLoader().load(
      "https://assets.codepen.io/3685267/dolphin-waternormals.jpg",
      function (texture) {
        texture.wrapS = texture.wrapT = THREE.RepeatWrapping;
      }
    ),
    sunDirection: new THREE.Vector3(),
    sunColor: 0xffffff,
    waterColor: 0x001e0f,
    distortionScale: 3.7,
    fog: scene.fog !== undefined
  });

  water.rotation.x = -Math.PI / 2;

  scene.add(water);

  return water;
}

function addBackground(scene, renderer, water) {
  const sun = new THREE.Vector3();
  const sky = new THREE.Sky();
  sky.scale.setScalar(10000);
  scene.add(sky);

  const skyUniforms = sky.material.uniforms;

  skyUniforms["turbidity"].value = 10;
  skyUniforms["rayleigh"].value = 2;
  skyUniforms["mieCoefficient"].value = 0.005;
  skyUniforms["mieDirectionalG"].value = 0.8;

  const parameters = {
    elevation: 2,
    azimuth: 180
  };

  const pmremGenerator = new THREE.PMREMGenerator(renderer);

  function updateSun() {
    const phi = THREE.MathUtils.degToRad(90 - parameters.elevation);
    const theta = THREE.MathUtils.degToRad(parameters.azimuth);

    sun.setFromSphericalCoords(1, phi, theta);

    sky.material.uniforms["sunPosition"].value.copy(sun);
    water.material.uniforms["sunDirection"].value.copy(sun).normalize();

    scene.environment = pmremGenerator.fromScene(sky).texture;
  }

  updateSun();
}

function map(value, sMin, sMax, dMin, dMax) {
  return dMin + ((value - sMin) / (sMax - sMin)) * (dMax - dMin);
}

    </script>