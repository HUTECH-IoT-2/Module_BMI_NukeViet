<!-- BEGIN: main -->
<!-- <div class="content">
    <div style="height:400px;">
        <form method="post" action="{FORM_ACTION}">
            <label>{LANG.height}: </label><input name='input_height' type="text" value="{HEIGHT}" class="form-control" >
            <label>{LANG.weight}: </label><input name='input_weight' type="text" value="{WEIGHT}" class="form-control">
            </br><Label>{LANG.total_bmi}: <label>{TOTAL_BMI}</label></Label>
            </br><Label>{LANG.diagnostic}: <label>{DIAGNOSTIC}</label></Label>
            </br><label>{ESTIMATE}</label></Label>
            </br><input type="submit" name="submit" value="RUN" class="btn btn-primary">
        </form>
    </div>
</div> -->
<form name="bmiForm" method="post" action="{FORM_ACTION}">
    <div class="bmi-calculator">
      <h1 style="margin-bottom: 1em;">Tính chỉ số BMI</h1>
      <div class="bmi-calculator-weight">
        <input class="weight-slider" name="realweight" id="myWeight" type="range" min="25" max="180" value="60"/>
        <p style="margin-top: 1.8em;">
        {LANG.weight}:
          <input name="input_weight" id="inputWeight" type="number" value="{WEIGHT}" min="25" max="180" oninput="showValWeight(this.value)"/>
          <span id="weight"></span> kg
        </p>
      </div>
      <div class="bmi-calculator-height">
        <input class="height-slider" name="realheight" id="myHeight" type="range" min="100" max="220" value="160">
        <p style="margin-top: 1.8em;">
        {LANG.height}: 
          <input name="input_height" id="inputHeight" type="number" value="{HEIGHT}" min="100" max="220" oninput="showValHeight(this.value)"/>
          <span id="height"></span> cm
        </p>
      </div>
      <input class="gumb" type="submit" name="submit" value="Tính" style="margin-top: 0.5em">
     <p style="margin-top: 1em;font-size: 1.2em;">
       <!-- <strong>{LANG.total_bmi}:</strong>
       <span id="yourbmi" style="font-size: 1.2em;margin-left: 8px;"></span>   -->
        </br><Label>{LANG.total_bmi}: <label>{TOTAL_BMI}</label></Label>
        </br><Label>{LANG.diagnostic}: <label>{DIAGNOSTIC}</label></Label>
        </br><label>{ESTIMATE}</label></Label>
     </p>


     <p>
       <span id="evaluationMessage"></span>
     </p>
    </div>
    </form>
<!-- END: main -->