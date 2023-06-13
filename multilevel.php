<?php
session_start();
require_once './dbconn.php';

$user_id = $_SESSION['user_login'];
$take = mysqli_query($link, "SELECT * FROM `user` WHERE user_id='$user_id';");
$taker = mysqli_fetch_assoc($take);
$name = $taker['name'];
$splitter = " ";
$pieces = explode($splitter, $name);

$queryd = mysqli_query($link, "SELECT * FROM `district`;");
$rowd = mysqli_fetch_assoc($queryd);

?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="form-group">
        <select id="level1" name="pmode" class="form-control">
            <option value="">Select Your District</option>
            <?php
            while ($rowd) {
            ?>
                <option value="<?php echo $rowd['name'] ?>"><?php echo $rowd['name'] ?></option>
            <?php
                $rowd = mysqli_fetch_assoc($queryd);
            }
            ?>
        </select>
    </div>
    <br />
    <br />

    <div class="form-group">
        <select id="level2" name="pmode2" class="form-control">
            <option value="">Select Your Subdistrict</option>
        </select>
    </div>

    <br />
    <br />
    <div class="form-group">
        <select id="level3" name="pmode3" class="form-control">
            <option value="">Select Your Subdistrict</option>
        </select>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#level1").change(function() {
                $.ajax({
                    url: "man.php",
                    data: {
                        level1Value: $(this).val()
                    },
                    success: function(data) {
                        $("#level2").html(data);
                    }
                });
            });

            $("#level2").change(function() {
                $.ajax({
                    url: "man.php",
                    data: {
                        level2Value: $(this).val()
                    },
                    success: function(data) {
                        $("#level3").html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>