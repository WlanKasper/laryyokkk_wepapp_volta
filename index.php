<!-- 
    192.168.0.198/classi/5E/smirnov/index.php
    192.168.105.20/5E/smirnov/index.php
    locaclhost:8080/index.php
-->

<?php
    $BACKGROUND_COLOR = "#4D4847";
    $SEC_BACKGROUND_COLOR = "#F4FFF8";
    $TITLE_COLOR = "#FFF1A6";
    $SEC_TITLE_COLOR = "#4CABA5";
    $TEXT_COLOR = "#F4FFF8";
    $SEC_TEXT_COLOR = "#4D4847";

    include './php/manager_db.php';
    Close_mysql_conn(Open_mysql_conn());

    session_start();
    $conn_status = $_SESSION['conn_status'];
    $db_response = $_SESSION['db_response'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= "Script PHP"; ?>
    </title>
    <link rel="stylesheet" href="./css/style.css">

    <style>
        body {
            background: <?=$BACKGROUND_COLOR;?>;
        }


        #header_menu:hover{
            transform: rotate(90deg);
        }

        #header_menu:hover .menu_line{
            background: <?=$SEC_TITLE_COLOR;?>;
        }

        button {
            background: <?=$SEC_TITLE_COLOR;?>;
            border: 2px solid <?=$TITLE_COLOR;?>;
        }

        button:hover {
            background: <?=$BACKGROUND_COLOR;?>;
        }

        .p_title,
        .p_text_btn {
            color: <?=$TITLE_COLOR;?>;
        }

        #p_title_wrapper {
            border-bottom: 2px solid <?=$TITLE_COLOR;?>;
        }

        .p_sec_title {
            color: <?=$SEC_TITLE_COLOR;?>;
        }

        .p_text {
            color: <?=$TEXT_COLOR;?>;
        }

        .mid_line {
            background: <?=$TITLE_COLOR;?>;
        }
        
        .menu_line{
            background: <?=$TITLE_COLOR;?>;
        }

        input {
            border: 2px solid <?=$SEC_TITLE_COLOR;?>;
            color: <?=$TEXT_COLOR;?>;
        }

        input:focus {
            border: 2px solid <?=$TITLE_COLOR;?>;
        }
    </style>
</head>

<body>
    <section>
        <header>
            <div id="header_sys_info">
                <p class="p_title p_sys">
                    <?php  
                        $_IP = $_SERVER['REMOTE_ADDR'];
                        echo $_IP;
                    ?>
                </p>
                <p class="p_title p_sys" id="p_time">
                    <script>
                        Date.prototype.timeNow = function () {
                            return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
                        }
                        setInterval(function(){
                            document.getElementById('p_time').innerHTML = new Date().timeNow();
                        }, 10);
                    </script>
                </p>
            </div>
            <p class="p_title" id="header_title">
                Cool WebApp<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p_sec_title">by
                    Laryyokkk</span>
            </p>
            <div id="wrapper_menu">
                <div id="header_menu">
                    <div class="menu_line"></div>
                    <div class="menu_line"></div>
                    <div class="menu_line"></div>
                    <div class="menu_line"></div>
                </div>
            </div>
        </header>
        <main>
            <div id="wrapper_title">
                <span class="p_title">
                    TP:
                </span>
                <span class="p_title p_sec_title" id="p_title_wrapper">
                    First WebServer
                </span>
            </div>
            <div class="wrapper">
                <div class="tb_box">
                    <form action="./php/post_to_db.php" method="post">
                        <p class="p_text p_sp_text">
                            POST
                        </p>
                        <input type="text" name="input_firstname" class="_input" id="input_firstname" placeholder="firstname">
                        <input type="text" name="input_lastname"  class="_input" id="input_lastname"  placeholder="lastname">
                        <button type="submit">
                            <p class="p_text_btn">
                                Submit
                            </p>
                        </button>
                    </form>
                    <!-- <p class="p_text p_text_sm">
                        temp
                    </p> -->
                </div>

                <div class="mid_line"></div>

                <div class="tb_box">
                    <form action="./php/get_from_db.php" method="get">
                        <p class="p_text p_sp_text">
                            GET
                        </p>
                        <input type="text" name="input_firstname" class="_input" id="input_firstname" placeholder="firstname">
                        <input type="text" name="input_lastname"  class="_input" id="input_lastname"  placeholder="lastname">
                        <button type="submit">
                            <p class="p_text_btn">
                                Submit
                            </p>
                        </button>
                    </form>
                    <!-- <p class="p_text p_text_sm">
                        temp
                    </p> -->
                </div>
            </div>
        </main>
        <footer>
            <div id="db_status_box">
                <p class="p_text p_text_sm  p_dp_status">     
                </p>
            </div>
            <div id="db_box">
                <p class="p_text p_text_sm p_dp_response">
                </p>
            </div>
            <script>
                let status_box = document.getElementsByClassName('p_dp_status')[0];
                let response_box = document.getElementsByClassName('p_dp_response')[0];
                let args_status = ['Database: <?= $database_name; ?>', "Tables: ", "Connection: <?= $conn_status; ?>"];

                status_box.innerHTML = "";
                for (i = 0; i < args_status.length; i++) {
                    status_box.appendChild(document.createTextNode(args_status[i]));
                    status_box.appendChild(document.createElement("br"));
                }

                let response_box_cont = document.createTextNode('<?php if ($db_response != null) { echo $db_response; } else {echo '';} ?>');
                response_box.appendChild(response_box_cont);

                setInterval(function(){
                    response_box.innerHTML = "";
                }, 5000);
            </script>
        </footer>
    </section>
</body>
<script>
    const body = document.body;
    const html = document.documentElement;
    const _height = Math.max(body.scrollHeight, body.offsetHeight,
    html.clientHeight, html.scrollHeight, html.offsetHeight);
    document.getElementsByTagName('section')[0].style.height = _height + "px";
</script>

<script src="./js/script.js"></script>
</html>