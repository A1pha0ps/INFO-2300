<?php

include_once("includes/db.php");
$db = open_sqlite_db("db/site.sqlite");

$add_name = NULL;
$add_ID = NULL;
$add_genus = NULL;

#Sticky Variables for the Filtering Form

$sticky_constructive = '';
$sticky_sensory = '';
$sticky_physical = '';
$sticky_imaginative = '';
$sticky_restorative = '';
$sticky_expressive = '';
$sticky_rules = '';
$sticky_bio = '';
$sticky_nooks = '';
$sticky_loose = '';
$sticky_climbing = '';
$sticky_mazes = '';
$sticky_evocative = '';

$sticky_sort_def = '';
$sticky_sort_asc = '';
$sticky_sort_desc = '';

$sticky_constructive_tag = 'hidden';
$sticky_sensory_tag = 'hidden';
$sticky_physical_tag = 'hidden';
$sticky_imaginative_tag ='hidden';
$sticky_restorative_tag ='hidden';
$sticky_expressive_tag = 'hidden';
$sticky_rules_tag ='hidden';
$sticky_bio_tag = 'hidden';
$sticky_nooks_tag = 'hidden';
$sticky_loose_tag = 'hidden';
$sticky_climbing_tag = 'hidden';
$sticky_mazes_tag = 'hidden';
$sticky_evocative_tag = 'hidden';

#Sticky Variables for the Add Plant Form

$sticky_constructive_ = "";
$sticky_sensory_ = "";
$sticky_physical_ = "";
$sticky_imaginative_ = "";
$sticky_restorative_ = "";
$sticky_expressive_ = "";
$sticky_rules_ = "";
$sticky_bio_ = "";
$sticky_nooks_ = "";
$sticky_loose_ = "";
$sticky_climbing_ = "";
$sticky_mazes_ = "";
$sticky_evocative_ = "";

$filterEnabled = false;

$filterHeader = 'hidden';

if(isset($_GET['filter'])){

  if(isset($_GET['ConstructivePlay'])){
    $sticky_constructive = (empty(trim($_GET['ConstructivePlay'])) ? "" : "checked");
    if(!empty($sticky_constructive)){ $filterEnabled = true; }
    if(!empty($sticky_constructive_tag)){$sticky_constructive_tag='';}
  }

  if(isset($_GET['SensoryPlay'])){
    $sticky_sensory = (empty(trim($_GET['SensoryPlay'])) ? "" : "checked");
    if(!empty($sticky_sensory)){ $filterEnabled = true; }
    if(!empty($sticky_sensory_tag)){$sticky_sensory_tag='';}
  }

  if(isset($_GET['PhysicalPlay'])){
    $sticky_physical = (empty(trim($_GET['PhysicalPlay'])) ? "" : "checked");
    if(!empty($sticky_physical)){ $filterEnabled = true; }
    if(!empty($sticky_physical_tag)){$sticky_physical_tag='';}
  }

  if(isset($_GET['ImaginativePlay'])){
    $sticky_imaginative = (empty(trim($_GET['ImaginativePlay'])) ? "" : "checked");
    if(!empty($sticky_imaginative)){ $filterEnabled = true; }
    if(!empty($sticky_imaginative_tag)){$sticky_imaginative_tag='';}
  }

  if(isset($_GET['RestorativePlay'])){
    $sticky_restorative = (empty(trim($_GET['RestorativePlay'])) ? "" : "checked");
    if(!empty($sticky_restorative)){ $filterEnabled = true; }
    if(!empty($sticky_restorative_tag)){$sticky_restorative_tag='';}
  }

  if(isset($_GET['ExpressivePlay'])){
    $sticky_expressive = (empty(trim($_GET['ExpressivePlay'])) ? "" : "checked");
    if(!empty($sticky_expressive)){ $filterEnabled = true; }
    if(!empty($sticky_expressive_tag)){$sticky_expressive_tag='';}
  }

  if(isset($_GET['PlayWithRules'])){
    $sticky_rules = (empty(trim($_GET['PlayWithRules'])) ? "" : "checked");
    if(!empty($sticky_rules)){ $filterEnabled = true; }
    if(!empty($sticky_rules_tag)){$sticky_rules_tag='';}
  }

  if(isset($_GET['BioPlay'])){
    $sticky_bio = (empty(trim($_GET['BioPlay'])) ? "" : "checked");
    if(!empty($sticky_bio)){ $filterEnabled = true; }
    if(!empty($sticky_bio_tag)){ $sticky_bio_tag = ''; }
  }

  if(isset($_GET['Nooks'])){
    $sticky_nooks = (empty(trim($_GET['Nooks'])) ? "" : "checked");
    if(!empty($sticky_nooks)){ $filterEnabled = true; }
    if(!empty($sticky_nooks_tag)){$sticky_nooks_tag='';}
  }

  if(isset($_GET['LooseParts'])){
    $sticky_loose = (empty(trim($_GET['LooseParts'])) ? "" : "checked");
    if(!empty($sticky_loose)){ $filterEnabled = true; }
    if(!empty($sticky_loose_tag)){$sticky_loose_tag="";}
  }

  if(isset($_GET['ClimbingAndSwinging'])){
    $sticky_climbing = (empty(trim($_GET['ClimbingAndSwinging'])) ? "" : "checked");
    if(!empty($sticky_climbing)){ $filterEnabled = true; }
    if(!empty($sticky_climbing_tag)){$sticky_climbing_tag='';}
  }

  if(isset($_GET['Maze'])){
    $sticky_mazes = (empty(trim($_GET['Maze'])) ? "" : "checked");
    if(!empty($sticky_mazes)){ $filterEnabled = true; }
    if(!empty($sticky_mazes_tag)){$sticky_mazes_tag='';}
  }

  if(isset($_GET['Evocative'])){
    $sticky_evocative = (empty(trim($_GET['Evocative'])) ? "" : "checked");
    if(!empty($sticky_evocative)){ $filterEnabled = true; }
    if(!empty($sticky_evocative_tag)){$sticky_evocative_tag='';}
  }

  $selected = trim($_GET['sort']);
  $sticky_sort_def = ($selected == '' ? 'selected' : '');
  $sticky_sort_asc = ($selected == 'asc' ? 'selected' : '');
  $sticky_sort_desc = ($selected == 'desc' ? 'selected' : '');
}

if($filterEnabled){
  $filterHeader = '';
}

$addName_feedback_class = 'hidden';
$plantID_feedback_class = 'hidden';
$genus_feedback_class = 'hidden';
$plantTag_feedback_class = 'hidden';

$numsChecked = 0;

$valid_form = false;

$addConstructive = 0;
$addSensory = 0;
$addPhysical = 0;
$addImaginative = 0;
$addRestorative = 0;
$addExpressive = 0;
$addRules = 0;
$addBio = 0;
$addNooks = 0;
$addLoose = 0;
$addClimbing = 0;
$addMazes = 0;
$addEvocative = 0;

$plantAdded = false;

if(isset($_POST['addplant'])){

  $valid_form = true;

  $plantName = (isset($_POST['PlantName']) ? trim($_POST['PlantName']) : '');
  $plantID = (isset($_POST['PlantID']) ? trim($_POST['PlantID']) : '');
  $plantGenus = (isset($_POST['PlantGenus']) ? trim($_POST['PlantGenus']) : '');

  if($plantName == ''){
    $valid_form = false;
    $addName_feedback_class = '';
  }

  if($plantID == ''){
    $valid_form = false;
    $plantID_feedback_class = '';
  }

  if($plantGenus == ''){
    $valid_form = false;
    $genus_feedback_class = '';
  }

  if(isset($_POST['playTypeAdd'])){
    $plantAddArr = $_POST['playTypeAdd'];
    foreach($plantAddArr as $checkBoxVal){

      ${$checkBoxVal} = 'checked';
      $numsChecked++;

      switch($checkBoxVal){
        case 'sticky_constructive_':
          $addConstructive = 1;
          break;
        case 'sticky_sensory_':
          $addSensory = 1;
          break;
        case 'sticky_physical_':
          $addPhysical = 1;
          break;
        case 'sticky_imaginative_':
          $addImaginative = 1;
          break;
        case 'sticky_restorative_':
          $addRestorative = 1;
          break;
        case 'sticky_expressive_':
          $addExpressive = 1;
          break;
        case 'sticky_rules_':
          $addRules = 1;
          break;
        case 'sticky_bio_':
          $addBio = 1;
          break;
        case 'sticky_nooks_':
          $addNooks = 1;
          break;
        case 'sticky_loose_':
          $addLoose = 1;
          break;
        case 'sticky_climbing_':
          $addClimbing = 1;
          break;
        case 'sticky_mazes_':
          $addMazes = 1;
          break;
        case 'sticky_evocative_':
          $addEvocative = 1;
          break;
      }
    }
  }

  if($numsChecked == 0){

    $valid_form = false;
    $plantTag_feedback_class = '';

  }

  if($valid_form){
    $result = exec_sql_query(
      $db,
      "INSERT INTO plants (PlantName,PlantGenus,PlantID,ExploratoryConstructivePlay,ExploratorySensoryPlay,PhyiscalPlay,ImaginativePlay,RestorativePlay,ExpressivePlay,PlayWithRules,BioPlay,Nooks_SecretSpaces,LooseParts_PlaySpaces,Climbing_Swinging,Mazes,UniqueElements) VALUES (:PlantName,:PlantGenus,:PlantID,:ExploratoryConstructivePlay,:ExploratorySensoryPlay,:PhyiscalPlay,:ImaginativePlay,:RestorativePlay,:ExpressivePlay,:PlayWithRules,:BioPlay,:Nooks_SecretSpaces,:LooseParts_PlaySpaces,:Climbing_Swinging,:Mazes,:UniqueElements);",
      array(
        ':PlantName' => $plantName,
        ':PlantGenus' => $plantGenus,
        ':PlantID' => $plantID,
        ':ExploratoryConstructivePlay' => $addConstructive,
        ':ExploratorySensoryPlay' => $addSensory,
        ':PhyiscalPlay' => $addPhysical,
        ':ImaginativePlay' => $addImaginative,
        ':RestorativePlay' => $addRestorative,
        ':ExpressivePlay' => $addExpressive,
        ':PlayWithRules' => $addRules,
        ':BioPlay' => $addBio,
        ':Nooks_SecretSpaces' => $addNooks,
        ':LooseParts_PlaySpaces' => $addLoose,
        ':Climbing_Swinging' => $addClimbing,
        ':Mazes' => $addMazes,
        ':UniqueElements' => $addEvocative
      )
    );

    if($result){
      $plantAdded = true;
      $plantAddArr = $_POST['playTypeAdd'];
      foreach($plantAddArr as $checkBoxVal){

        ${$checkBoxVal} = '';

      }
    }
  }else{
    $add_name = $plantName;
    $add_ID = $plantID;
    $add_genus = $plantGenus;
  }
}

$sql_select_part = 'SELECT * FROM plants';
$sql_where_part = '';
$sql_where_clauses = array();

if(isset($_GET['ConstructivePlay'])){
  $filter_constructive = (bool)($_GET['ConstructivePlay']);
}else{
  $filter_constructive = 0;
}

if(isset($_GET['SensoryPlay'])){
  $filter_sensory = (bool)($_GET['SensoryPlay']);
}else{
  $filter_sensory= 0;
}

if(isset($_GET['PhysicalPlay'])){
  $filter_physical = (bool)($_GET['PhysicalPlay']);
}else{
  $filter_physical= 0;
}

if(isset($_GET['ImaginativePlay'])){
  $filter_imaginative = (bool)($_GET['ImaginativePlay']);
}else{
  $filter_imaginative= 0;
}

if(isset($_GET['filter_restorative'])){
  $filter_restorative = (bool)($_GET['RestorativePlay']);
}else{
  $filter_restorative= 0;
}

if(isset($_GET['ExpressivePlay'])){
  $filter_expressive = (bool)($_GET['ExpressivePlay']);
}else{
  $filter_expressive= 0;
}

if(isset($_GET['PlayWithRules'])){
  $filter_rules = (bool)($_GET['PlayWithRules']);
}else{
  $filter_rules= 0;
}

if(isset($_GET['BioPlay'])){
  $filter_bio = (bool)($_GET['BioPlay']);
}else{
  $filter_bio= 0;
}

if(isset($_GET['Nooks'])){
  $filter_nooks = (bool)($_GET['Nooks']);
}else{
  $filter_nooks= 0;
}

if(isset($_GET['LooseParts'])){
  $filter_loose = (bool)($_GET['LooseParts']);
}else{
  $filter_loose= 0;
}

if(isset($_GET['ClimbingAndSwinging'])){
  $filter_climbing = (bool)($_GET['ClimbingAndSwinging']);
}else{
  $filter_climbing= 0;
}

if(isset($_GET['Maze'])){
  $filter_mazes = (bool)($_GET['Maze']);
}else{
  $filter_mazes= 0;
}

if(isset($_GET['Evocative'])){
  $filter_evocative = (bool)($_GET['Evocative']);
}else{
  $filter_evocative= 0;
}

if($filter_constructive){
  array_push($sql_where_clauses, "(ExploratoryConstructivePlay = '1')");
}

if($filter_sensory){
  array_push($sql_where_clauses, "(ExploratorySensoryPlay = '1')");
}

if($filter_physical){
  array_push($sql_where_clauses, "(PhyiscalPlay = '1')");
}

if($filter_imaginative){
  array_push($sql_where_clauses, "(ImaginativePlay = '1')");
}

if($filter_restorative){
  array_push($sql_where_clauses, "(RestorativePlay = '1')");
}

if($filter_expressive){
  array_push($sql_where_clauses, "(ExpressivePlay = '1')");
}

if($filter_play){
  array_push($sql_where_clauses, "(PlayWithRules = '1')");
}

if($filter_bio){
  array_push($sql_where_clauses, "(BioPlay = '1')");
}

if($filter_nooks){
  array_push($sql_where_clauses, "(Nooks_SecretSpaces = '1')");
}

if($filter_loose){
  array_push($sql_where_clauses, "(LooseParts_PlaySpaces = '1')");
}

if($filter_climbing){
  array_push($sql_where_clauses, "(Climbing_Swinging = '1')");
}

if($filter_mazes){
  array_push($sql_where_clauses, "(Mazes = '1')");
}

if($filter_evocative){
  array_push($sql_where_clauses, "(UniqueElements = '1')");
}

if(count($sql_where_clauses) > 0){
  $sql_where_part = ' WHERE ' . implode(' AND ', $sql_where_clauses);
}

if(isset($_GET['sort'])){
  $selected = trim($_GET['sort']);
}else{
  $selected = 0;
}

if($selected == 'asc'){
  $sql_orderby_part = ' ORDER BY PlantName ASC;';
}else if($selected == 'desc'){
  $sql_orderby_part = ' ORDER BY PlantName DESC;';
}else{
  $sql_orderby_part = '';
}

$query = $sql_select_part . $sql_where_part . $sql_orderby_part;

$records = exec_sql_query($db, $query)->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Playful Plants Project Database</title>

  <link href="/public/css/styles.css" type="text/css" rel="stylesheet" />
</head>

<body>

  <header>
    <h1>Playful Plants Project Database</h1>
  </header>

  <div id="mainBody">
    <div id="form-group">
      <aside class="form">
        <form method="get" action="/" novalidate>
          <h1>Filtering</h1>
          <p>Add filter tags to sort entries by Property.</p>

          <fieldset>

            <legend>Filter by Play Type</legend>

            <div class="label-input">
              <input type="checkbox" id="Constructive" name="ConstructivePlay" <?php echo htmlspecialchars($sticky_constructive) ?>>
              <label for="Constructive">Supports Exploratory Constructive Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="Sensory" name="SensoryPlay" <?php echo htmlspecialchars($sticky_sensory) ?>>
              <label for="Sensory">Supports Exploratory Sensory Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="Physical" name="PhysicalPlay" <?php echo htmlspecialchars($sticky_physical) ?>>
              <label for="Physical">Supports Physical Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="Imaginative" name="ImaginativePlay" <?php echo htmlspecialchars($sticky_imaginative) ?>>
              <label for="Imaginative">Supports Imaginative Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="Restorative" name="RestorativePlay" <?php echo htmlspecialchars($sticky_restorative) ?>>
              <label for="Restorative">Supports Restorative Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="Expressive" name="ExpressivePlay" <?php echo htmlspecialchars($sticky_expressive) ?>>
              <label for="Expressive">Supports Expressive Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="Rules" name="PlayWithRules" <?php echo htmlspecialchars($sticky_rules) ?>>
              <label for="Rules">Supports Play With Rules</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="BioPlay" name="BioPlay" <?php echo htmlspecialchars($sticky_bio) ?>>
              <label for="BioPlay">Supports Bio Play</label>
            </div>
          </fieldset>

          <fieldset>
            <legend>Filter By Play Activities:</legend>
            <div class="label-input">
              <input type="checkbox" id="Nooks" name="Nooks" <?php echo htmlspecialchars($sticky_nooks) ?>>
              <label for="Nooks">Creates Nooks/Secret Spaces</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="Loose" name="LooseParts" <?php echo htmlspecialchars($sticky_loose) ?>>
              <label for="Loose">Has Loose Parts/Play Props</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="Climbing" name="ClimbingAndSwinging" <?php echo htmlspecialchars($sticky_climbing) ?>>
              <label for="Climbing">Climbing & Swinging</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="Maze" name="Maze" <?php echo htmlspecialchars($sticky_mazes) ?>>
              <label for="Maze">Mazes/Labyrinths/Spirals</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="Evocative" name="Evocative" <?php echo htmlspecialchars($sticky_evocative) ?>>
              <label for="Evocative">Evocative</label>
            </div>

          </fieldset>

          <div id='sorting'>
            <label for="sort_type">Sort By:</label>
            <select id="sort_type" name="sort" class="select">
              <option value='' <?php echo htmlspecialchars($sticky_sort_def) ?>>Nothing</option>
              <option value='asc' <?php echo htmlspecialchars($sticky_sort_asc) ?>>Ascending Order</option>
              <option value='desc' <?php echo htmlspecialchars($sticky_sort_desc) ?>>Descending Order</option>
            </select>
          </div>

          <div class="align-right">
            <input id="button" type="submit" value="Filter!" name="filter"/>
          </div>

        </form>
      </aside>

      <aside class="form">
        <form id="addingForm" method="post" action="/" novalidate>
          <h1>Add a Plant!</h1>
          <p>Fill in all fields and add a new plant!</p>

          <p class="formError <?php echo htmlspecialchars($addName_feedback_class) ?>">Invalid Submission: You must fill out the plant name!</p>

          <div class="label-input">
            <label for="PlantNameAdd">Plant Name:</label>
          <input type="text" id="PlantNameAdd" name="PlantName" value="<?php echo htmlspecialchars($add_name) ?>"></div>

          <p class="formError <?php echo htmlspecialchars($plantID_feedback_class) ?>">Invalid Submission: You must fill out the plant ID!</p>

          <div class="label-input">
            <label for="PlantIDAdd">Plant ID:</label>
          <input type="text" id="PlantIDAdd" name="PlantID" value="<?php echo htmlspecialchars($add_ID) ?>"></div>

          <p class="formError <?php echo htmlspecialchars($genus_feedback_class) ?>">Invalid Submission: You must fill out the plant Genus/Species!</p>

          <div class="label-input">
            <label for="PlantGenusAdd">Plant Genus/Species:</label>
          <input type="text" id="PlantGenusAdd" name="PlantGenus" value="<?php echo htmlspecialchars($add_genus) ?>"></div>

          <p class="formError <?php echo htmlspecialchars($plantTag_feedback_class) ?>">Invalid Submission: You must check at least ONE play type.</p>

          <fieldset>

            <legend>Select Supported Play Type</legend>

            <div class="label-input">
              <input type="checkbox" id="ConstructiveAdd" name="playTypeAdd[]" value="sticky_constructive_" <?php echo $sticky_constructive_?>>
              <label for="ConstructiveAdd">Supports Exploratory Constructive Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="SensoryAdd" name="playTypeAdd[]" value="sticky_sensory_" <?php echo $sticky_sensory_?>>
              <label for="SensoryAdd">Supports Exploratory Sensory Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="PhysicalAdd" name="playTypeAdd[]" value="sticky_physical_" <?php echo $sticky_physical_?>>
              <label for="PhysicalAdd">Supports Physical Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="ImaginativeAdd" name="playTypeAdd[]" value="sticky_imaginative_" <?php echo $sticky_imaginative_?>>
              <label for="ImaginativeAdd">Supports Imaginative Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="RestorativeAdd" name="playTypeAdd[]" value="sticky_restorative_" <?php echo $sticky_restorative_?>>
              <label for="RestorativeAdd">Supports Restorative Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="ExpressiveAdd" name="playTypeAdd[]" value="sticky_expressive_" <?php echo $sticky_expressive_?>>
              <label for="ExpressiveAdd">Supports Expressive Play</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="RulesAdd" name="playTypeAdd[]" value="sticky_rules_" <?php echo $sticky_rules_?>>
              <label for="RulesAdd">Supports Play With Rules</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="BioPlayAdd" name="playTypeAdd[]" value="sticky_bio_" <?php echo $sticky_bio_?>>
              <label for="BioPlayAdd">Supports Bio Play</label>
            </div>
          </fieldset>

          <fieldset>
            <legend>Select Supported Play Activities</legend>
            <div class="label-input">
              <input type="checkbox" id="NooksAdd" name="playTypeAdd[]" value="sticky_nooks_" <?php echo $sticky_nooks_?>>
              <label for="NooksAdd">Creates Nooks/Secret Spaces</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="LooseAdd" name="playTypeAdd[]" value="sticky_loose_" <?php echo $sticky_loose_?>>
              <label for="LooseAdd">Has Loose Parts/Play Props</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="ClimbingAdd" name="playTypeAdd[]" value="sticky_climbing_" <?php echo $sticky_climbing_?>>
              <label for="ClimbingAdd">Climbing & Swinging</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="MazesAdd" name="playTypeAdd[]" value="sticky_mazes_" <?php echo $sticky_mazes_?>>
              <label for="MazesAdd">Mazes/Labyrinths/Spirals</label>
            </div>

            <div class="label-input">
              <input type="checkbox" id="EvocativeAdd" name="playTypeAdd[]" value="sticky_evocative_" <?php echo $sticky_evocative_?>>
              <label for="EvocativeAdd">Evocative</label>
            </div>

          </fieldset>

          <div class="align-right">
            <input id="button" type="submit" value="Add" name="addplant"/>
          </div>

        </form>
      </aside>
    </div>
    <div class="submitMessage <?php if($plantAdded){
        echo htmlspecialchars('');
      }else{
        echo htmlspecialchars('hidden');
      }?>">
      <h1>Successful plant submission! Plant <?php echo $plantName ?> has been added to the database.</h1>
    </div>
    <div class="filterHeader <?php echo htmlspecialchars($filterHeader) ?>">
      <h2>Filtering By:</h2>
      <span class="label <?php echo htmlspecialchars($sticky_constructive_tag) ?>">Exploratory Constructive Play</span>

      <span class="label <?php echo htmlspecialchars($sticky_sensory_tag) ?>">Exploratory Sensory Play</span>

      <span class="label <?php echo htmlspecialchars($sticky_physical_tag) ?>">Physical Play</span>

      <span class="label <?php echo htmlspecialchars($sticky_imaginative_tag) ?>">Imaginative Play</span>

      <span class="label <?php echo htmlspecialchars($sticky_restorative_tag) ?>">Restorative Play</span>

      <span class="label <?php echo htmlspecialchars($sticky_expressive_tag) ?>">Expressive Play</span>

      <span class="label <?php echo htmlspecialchars($sticky_rules_tag) ?>">Play With Rules</span>

      <span class="label <?php echo htmlspecialchars($sticky_bio_tag) ?>">Bio Play</span>

      <span class="label <?php echo htmlspecialchars($sticky_nooks_tag) ?>">Nooks/Secret Spaces</span>

      <span class="label <?php echo htmlspecialchars($sticky_loose_tag) ?>">Loose Parts/Play Props</span>

      <span class="label <?php echo htmlspecialchars($sticky_climbing_tag) ?>">Climbing/Swinging</span>

      <span class="label <?php echo htmlspecialchars($sticky_mazes_tag) ?>">Mazes/Labyrinyths/Spirals</span>

      <span class="label <?php echo htmlspecialchars($sticky_evocative_tag) ?>">Evocative/Unique Elements</span>
    </div>
    <div id="db">
      <table class='tabletd'>
        <tr id="trHeader">
          <th class="info header"><h2>Plant Info</h2></th>
          <th class="tags header"><h2>Plant Properties</h2></th>
        </tr>
        <?php

        foreach($records as $record) { ?>

          <tr>
            <td class="info">
            <h2 id="PlantName"><?php echo htmlspecialchars($record['PlantName']) ?></h2>
            <h3><?php echo htmlspecialchars($record['PlantID']) ?></h3>
            <h3><?php echo htmlspecialchars($record['PlantGenus']) ?></h3>
            </td>
            <td class="tags">

              <?php
                $exploreconstruct = 'hidden';
                $exploresensory = 'hidden';
                $physicalplay = 'hidden';
                $imaginativeplay = 'hidden';
                $restorativeplay = 'hidden';
                $expressiveplay = 'hidden';
                $playwithrules = 'hidden';
                $bioplay = 'hidden';
                $nooks = 'hidden';
                $looseparts = 'hidden';
                $climbing = 'hidden';
                $mazes = 'hidden';
                $uniqueElem = 'hidden';
              ?>

              <h2 class="top-subtitle">Types of Play Supported:</h2>

              <?php
                if($record['ExploratoryConstructivePlay'] == 1){
                  $exploreconstruct = '';
                }
                if($record['ExploratorySensoryPlay'] == 1){
                  $exploresensory = '';
                }
                if($record['PhyiscalPlay'] == 1){
                  $physicalplay = '';
                }
                if($record['ImaginativePlay'] == 1){
                  $imaginativeplay = '';
                }
                if($record['RestorativePlay'] == 1){
                  $restorativeplay = '';
                }
                if($record['ExpressivePlay'] == 1){
                  $expressiveplay = '';
                }
                if($record['PlayWithRules'] == 1){
                  $playwithrules = '';
                }
                if($record['BioPlay'] == 1){
                  $bioplay = '';
                }
                if($record['Nooks_SecretSpaces'] == 1){
                  $nooks = '';
                }
                if($record['LooseParts_PlaySpaces'] == 1){
                  $looseparts = '';
                }
                if($record['Climbing_Swinging'] == 1){
                  $climbing = '';
                }
                if($record['Mazes'] == 1){
                  $mazes = '';
                }
                if($record['UniqueElements'] == 1){
                  $uniqueElem = '';
                }
              ?>

              <span class="label <?php echo htmlspecialchars($exploreconstruct) ?>">Exploratory Constructive Play</span>

              <span class="label <?php echo htmlspecialchars($exploresensory) ?>">Exploratory Sensory Play</span>

              <span class="label <?php echo htmlspecialchars($physicalplay) ?>">Physical Play</span>

              <span class="label <?php echo htmlspecialchars($imaginativeplay) ?>">Imaginative Play</span>

              <span class="label <?php echo htmlspecialchars($restorativeplay) ?>">Restorative Play</span>

              <span class="label <?php echo htmlspecialchars($expressiveplay) ?>">Expressive Play</span>

              <span class="label <?php echo htmlspecialchars($playwithrules) ?>">Play With Rules</span>

              <span class="label <?php echo htmlspecialchars($bioplay) ?>">Bio Play</span>

              <h2 class="bottom-subtitle">Activities of Play Supported:</h2>

              <span class="label <?php echo htmlspecialchars($nooks) ?>">Nooks/Secret Spaces</span>

              <span class="label <?php echo htmlspecialchars($looseparts) ?>">Loose Parts/Play Props</span>

              <span class="label <?php echo htmlspecialchars($climbing) ?>">Climbing/Swinging</span>

              <span class="label <?php echo htmlspecialchars($mazes) ?>">Mazes/Labyrinyths/Spirals</span>

              <span class="label <?php echo htmlspecialchars($uniqueElem) ?>">Evocative/Unique Elements</span>
            </td>
          </tr>

        <?php } ?>
      </table>
    </div>
  </div>

</body>

</html>
