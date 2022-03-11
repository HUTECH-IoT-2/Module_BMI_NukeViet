'use strict';
// Define variables for range sliders
// Weight variables
var weightSlider = document.getElementById("myWeight");
var weightOutput = document.getElementById("inputWeight");
// Height variables
var heightSlider = document.getElementById("myHeight");
var heightOutput = document.getElementById("inputHeight");
// Display slider value
weightOutput.innerHTML = weightSlider.value;
heightOutput.innerHTML = heightSlider.value;
// Update sliders in real time while dragging it
weightSlider.oninput = function () {
  weightOutput.innerHTML = this.value;
}
heightSlider.oninput = function () {
  heightOutput.innerHTML = this.value;
}
// Change weight-slider value on weight-number input
function showValWeight(newVal) {
  weightSlider.value=newVal;
};
// Change height-slider value on height-number input
function showValHeight(newVal) {
  heightSlider.value=newVal;
};
// *** Change number input when dragging slider ***
// Add 2 eventListeners for weight and input sliders
weightSlider.addEventListener("input", updateValueWeight);
heightSlider.addEventListener("input", updateValueHeight);
function updateValueWeight(e) {
  weightOutput.value = e.srcElement.value;
}
function updateValueHeight(e) {
  heightOutput.value = e.srcElement.value;
}
