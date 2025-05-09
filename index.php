<?php require 'Pages/Admin/php/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/Style/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="Assets/Image/logo.png">
    <title>EjectFBShowMatch</title>
</head>
<body>
    <nav class="nav">
        <img class="logo_nav" src="Assets/Image/logo.png" alt="">
        <h1 class="title">SHOWMATCH</h1>
        <a href="#reg_id" class="reg_link"><h5 class="reg">Зарегистрироваться</h5></a>
    </nav>
    <main>
        <section class="info_live">
            <section>
                <h3 class="title_live">Прямая трансляция матча</h3>
            </section>
            <section class="live_sect">
                <article class="live">
                    <iframe
                        src="https://player.twitch.tv/?channel=ejectfb&parent=streamernews.example.com"
                        height="360"
                        width="640,5"
                        allowfullscreen>
                    </iframe>
                    <a href="https://www.twitch.tv/ejectfb" class="join_link" target="_blank"><h5 class="join_live">Посетить твич</h5></a>
                </article>
                <article class="info">
                    <h5>От канала <bold>EjectFB</bold> мы проводим шоуматч <u>2v2</u> с прямой трансляцией! Для участния вы можете зарегистрировать свою команду по форме ниже. <br><br> <span style="color: #b5b5b5;">Регистрация проходит до: <br>Прямая трансляция: </span></h5>
                </article>
            </section>
        </section>
        <hr>
        <section class="reg_sect">
            <form method="post" action="Pages/Admin/php/submitforms.php" class="reg_form" enctype="multipart/form-data">
                <fieldset id="reg_id">
                    <legend>Регистрация на шоуматч от EjectFB</legend>
                    <section class="form">
                        <input type="text" name="team_name" placeholder="Название команды" required>
                        <input type="text" name="player_nick_1" placeholder="Ник игрока" required>
                        <input type="text" name="player_nick_2" placeholder="Ник игрока" required>
                        <label>Логотип команды <span class="dop_info">ⓘ<h5 class="content_dop_info">Логотип не должен содержать: <br> 1. Оскорбления <br> 2. Запрещенные слова <br> 3. Порнографию</h5></span> <input type="file" name="logo" required></label>
                        <button class="sumbit" type="sumbit"><h5>Отправить на проверку</h5></button>
                    </section>
                    <section class="info_reg">
                        <p>Для участия в шоуматче 2v2 заполните форму и отправьте на проверку. При неправильно заполненной форме ваша заявка будет отклонена! Подтвержденные команды и команды на проверке будут отображены снизу. Если ваша команда не подтверждена и пропала из пункта "На проверке" означает, что ваша команда не прошла проверку.</p>
                        <br>
                        <p>Удачи!</p>
                    </section>
                </fieldset>
            </form>
        </section>
        <hr>
        <section class="forms_accepts">
            <fieldset class="accept">
                <legend>Подтвержденные</legend>
                <section>
                <?php
                $result = $conn->query("SELECT * FROM teams WHERE status = 'confirmed' ORDER BY created_at DESC");
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='progress_php'>
                        <strong>{$row['team_name']}</strong><br>
                    </div>";
                }
                ?>
                </section>
            </fieldset>
            <fieldset class="progress">
                <legend>На проверке</legend>
                <section>
                <?php
                    $result = $conn->query("SELECT * FROM teams WHERE status = 'pending' ORDER BY created_at DESC");
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='progress_php'>
                            <strong>{$row['team_name']}</strong><br>
                        </div>";
                    }
                ?>
                </section>
            </fieldset>
        </section>
    </main>

    <footer class="footer">
        <section>
            <img src="Assets/Image/logo.png" alt="">
        </section>
        <section>
            <h3>Присоединяйся</h3>
            <a href="#reg_id" class="reg_link_footer"><h5>Зарегистрироваться</h5></a>
        </section>
        <section>
            <h3>О нас</h3>
            <h5>Разработчик: MrDew</h5>
            <h5>Стример: <a href="https://www.twitch.tv/ejectfb" class="streamer" target="_blank">EjectFB</a></h5>
        </section>
        <section class="social">
            <a href="https://t.me/EjectFB_twitch" target="_blank"><img src="Assets/Image/telegram.svg" alt=""></a>
            <a href="https://www.twitch.tv/ejectfb" target="_blank"><img src="Assets/Image/twitch.svg" alt=""></a>
            <a href="https://vk.com/ejectfb_oficial" target="_blank"><img src="Assets/Image/vk.svg" alt=""></a>
        </section>
    </footer>


</body>
</html>