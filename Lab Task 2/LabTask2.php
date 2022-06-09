<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        .red{
            color: red;

        }
    </style>
</head>
<body>
<?php
$nameErr = $emailErr = $dateErr = $genderErr= $degreeErr= $bloodGroupErr = "" ;
$name = $email = $date = $gender= $degree= $bloodGroup = "" ;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    $len= str_word_count($name);
    if($len>2){
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
          else{$nameErr="There should be more than 2 words.";}
    }
    }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["date"])) {
    $dateErr = "DOB is required";
  } else {
    $date = $_POST["date"];}
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }
  if (empty($_POST["degree"])) {
    $degreeErr = "Degree is required";
  } else {
    $degree = $_POST["degree"];
  }
  if (empty($_POST["bloodGroup"])) {
    $bloodGroupErr = "Blood group is required";

  } else {
    $bloodGroup = $_POST["bloodGroup"];
  }
}
?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
        <legend>NAME:</legend>
        NAME: <input type="text" name="name" value="<?php echo $name;?>"><span class="red">*<?php echo $nameErr ?></span>
        <br>
        </fieldset>
        <fieldset>
        <legend>EMAIL:</legend>
        EMAIL: <input type="text" name="email" value="<?php echo $email;?>"><span class="red">*<?php echo $emailErr ?></span>
        <br>
        </fieldset>
        <fieldset>
        <legend>DOB:</legend>
        DOB: <input type="date" id="date" name="date" min="1979-12-31" max="2000-01-02" value="<?php echo $date;?>"> <span class="red">*<?php echo $dateErr ?></span><br>
        </fieldset>
        <fieldset>
        <legend>GENDER</legend>
        GENDER:
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="female") echo "checked";?>
        value="female">Female
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="male") echo "checked";?>
        value="male">Male
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="other") echo "checked";?>
        value="other">Other<span class="red">*<?php echo $genderErr ?></span>
        <br>
        </fieldset>
        <fieldset>
        <legend>DEGREE:</legend>
        DEGREE:
        <input type="checkbox" name="degree"
        <?php if (isset($degree) && $degree=="SSC") echo "checked";?>
        value="SSC">SSC
        <input type="checkbox" name="degree"
        <?php if (isset($degree) && $degree=="HSC") echo "checked";?>
        value="HSC">HSC
        <input type="checkbox" name="degree"
        <?php if (isset($degree) && $degree=="BsC") echo "checked";?>
        value="BsC">BsC
        <input type="checkbox" name="gender"
        <?php if (isset($degree) && $degree=="MsC") echo "checked";?>
        value="MsC">MsC<span class="red">*<?php echo $degreeErr ?></span>
        <br>
        </fieldset>
        <fieldset>
        <legend>BLOOD GROUP:</legend>
        BLOOD GROUP:<select id="bloodGroup" name="bloodGroup">
            <option text="blank"></option>
            <option value="A-">A-</option>
            <option value="A+">A+</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
            <option value="O-">O-</option>
            <option value="O+">O+</option>
           </select><?php echo $bloodGroup;?> <span class="red">*<?php echo $bloodGroupErr ?></span>
           <br>
        </fieldset>
        <input type="submit" name="">
    </form>
    <h2>Input</h2>
    <?php
    echo $name."<br>";
    echo $email."<br>";
    echo $date."<br>";
    echo $gender."<br>";
    echo $degree."<br>";
    echo $bloodGroup."<br>";
     ?>
</body>
</html>