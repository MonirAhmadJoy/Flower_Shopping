<?php
session_start();
require_once './dbconn.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <script src="https://kit.fontawesome.com/cc0fc94170.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #submit:disabled {
            background-color: red;
            opacity: 0.5;
        }

        .important {
            font-weight: bold;
            font-size: xx-large;
        }

        .blue {
            color: blue;
        }

        .green {
            color: green;
        }

        .checked {
            color: orange;
        }
    </style>
</head>

<body>

    <div class="text" style="padding-left: 20px;">
        <p>Subscribe To Newsletter</p>
        <!-- <span id=<?php echo 'cntL' . $prID ?>>

            <?php
            echo "Total likes: " . $prID;
            ?>
        </span> -->

        <span id=<?php echo 'cntD' ?>>
            <?php
            echo "Total Dislike: ";
            ?>
        </span>
        <form action="" class="form-submit">
            <div>
                <span id="rat1" class="fa fa-star checked"></span>
                <span id="rat2" class="fa fa-star checked"></span>
                <span id="rat3" class="fa fa-star checked"></span>
                <span id="rat4" class="fa fa-star"></span>
                <span id="rat4" class="fa fa-star"></span>
            </div>
        </form>

    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var st = 0;
            $("#addItemlike").click(function(e) {
                // $("#addItemlike").css({ "background-color": "yellow"});
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".pid").val();
                st++;
                var lk = 1;
                var dk = 0;


                $.ajax({
                    url: 'man.php',
                    method: 'post',
                    data: {
                        Str: st,
                        pid: pid,
                    },
                    success: function(response) {
                        $("#cntL3").html(response);
                    }
                });

            });

            $("#rat1").click(function(e) {
                // $("#addItemlike").css({ "background-color": "yellow"});
                e.preventDefault();
                var pos=1;
                var st=2;
                $.ajax({
                    url: 'rataj.php',
                    method: 'post',
                    data: {
                        Str: st,
                        pos:pos,
                    },
                    success: function(response) {
                        $("#rat"+pos).html(response);
                    }
                });

            });

            $("#rat3").click(function(e) {
                // $("#addItemlike").css({ "background-color": "yellow"});
                e.preventDefault();
                var pos=3;
                var st=2;
                $.ajax({
                    url: 'rataj.php',
                    method: 'post',
                    data: {
                        Str: st,
                        pos:pos,
                    },
                    success: function(response) {
                        $("#rat"+pos).html(response);
                    }
                });

            });

            // $(".addItemdislike").click(function(e) {
            //     e.preventDefault();
            //     st++;
            //     $.ajax({
            //         url: 'man.php',
            //         method: 'post',
            //         data: {
            //             Strd: st,
            //         },
            //         success: function(response) {
            //             $("#count1").html(response);
            //         }
            //     });
            // });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>