<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/png">
    <title>Meowgle</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <nav class="navbar container  is-max-desktop" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="../index.php">
                <img src="./img/logo.png" alt="logo">
                <p class="title pl-2">Meowgle</p>
            </a>
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">

            <div class="navbar-end">

                <div class="navbar-item">
                    <div>
                        <a class="button is-danger is-light" href="?logout=true">
                            <strong>Log Out</strong>
                        </a>
                    </div>
                </div>
            </div>
    </nav>
    <div class="field container is-max-desktop mt-4">
        <div class="control is-flex is-flex-wrap-wrap is-flex-wrap-wrap">
            <input id="search_text" class="input" type="text" placeholder="Search for a cat breed">
            <progress id="progress" class="progress is-medium is-dark m-4" max="100">45%</progress>
        </div>
    </div>

    <div id="search_result" class="container p-4 is-max-desktop mt-4 is-flex is-flex-direction-row is-flex-wrap-wrap is-justify-content-start">
    </div>


    <script>
        const api_key = "live_imkbxXx8Ge6ARND763tSAsdzW4xAJ3iCk7ahGryOIsBx3piszkO3N9NXijxzv7TT";
        const api_url = "https://api.thecatapi.com/v1/breeds/search";



        function toEmojis(emoji, number) {
            let emojis = "";
            for (let i = 0; i < number; i++) {
                emojis += emoji;
            }
            return emojis;
        }

        class Cat {
            constructor(json) {
                this.id = json["id"];
                this.name = json["name"];
                this.description = json["description"];
                this.image = json["image"]["url"];
                this.intelligence = json["intelligence"];
                this.dog_friendly = json["dog_friendly"];
                this.country_code = json["country_code"].toUpperCase();
                this.wikipedia_url = json["wikipedia_url"];
            }

            getHTMLCard() {
                let cardDiv = document.createElement("div");
                cardDiv.classList.add("card", "m-2");
                cardDiv.style.width = "18rem";

                // Card image
                let cardImageDiv = document.createElement("div");
                cardImageDiv.classList.add("card-image");
                let figure = document.createElement("figure");
                figure.classList.add("image", "is-4by3");
                let img = document.createElement("img");
                img.src = this.image;
                img.alt = "Cat image";
                figure.appendChild(img);
                cardImageDiv.appendChild(figure);
                cardDiv.appendChild(cardImageDiv);

                // Card content
                let cardContentDiv = document.createElement("div");
                cardContentDiv.classList.add("card-content");

                // Media
                let mediaDiv = document.createElement("div");
                mediaDiv.classList.add("media");
                let mediaLeftDiv = document.createElement("div");
                mediaLeftDiv.classList.add("media-left");
                let mediaLeftFigure = document.createElement("figure");
                mediaLeftFigure.classList.add("image", "is-48x48");
                let mediaLeftImg = document.createElement("img");
                mediaLeftImg.src = "https://www.countryflagicons.com/FLAT/64/" + this.country_code + ".png";
                mediaLeftImg.alt = "Country flag";
                mediaLeftFigure.appendChild(mediaLeftImg);
                mediaLeftDiv.appendChild(mediaLeftFigure);
                mediaDiv.appendChild(mediaLeftDiv);

                let mediaContentDiv = document.createElement("div");
                mediaContentDiv.classList.add("media-content");
                let mediaTitle = document.createElement("p");
                mediaTitle.classList.add("title", "is-4");
                mediaTitle.innerText = this.name;
                let mediaSubtitle = document.createElement("p");
                mediaSubtitle.classList.add("subtitle", "is-6");
                mediaSubtitle.innerText = "#" + this.id;
                mediaContentDiv.appendChild(mediaTitle);
                mediaContentDiv.appendChild(mediaSubtitle);
                mediaDiv.appendChild(mediaContentDiv);
                cardContentDiv.appendChild(mediaDiv);

                // Card description
                let descriptionDiv = document.createElement("div");
                descriptionDiv.classList.add("content");
                descriptionDiv.innerText = this.description;
                cardContentDiv.appendChild(descriptionDiv);

                // Card attributes
                let attributesDiv = document.createElement("div");
                attributesDiv.classList.add("content");
                let attributesList = document.createElement("ul");

                let intelligenceItem = document.createElement("li");
                intelligenceItem.innerText = "Intelligence: " + toEmojis("🧠", this.intelligence);
                attributesList.appendChild(intelligenceItem);

                let dogFriendlyItem = document.createElement("li");
                dogFriendlyItem.innerText = "Dog Friendly: " + toEmojis("🐶", this.dog_friendly);
                attributesList.appendChild(dogFriendlyItem);

                attributesDiv.appendChild(attributesList);
                cardContentDiv.appendChild(attributesDiv);

                // Wikipedia link
                let linkDiv = document.createElement("div");
                linkDiv.classList.add("content");
                let link = document.createElement("a");
                link.href = this.wikipedia_url;
                link.target = "_blank";
                link.innerText = "More info on Wikipedia";
                linkDiv.appendChild(link);
                cardContentDiv.appendChild(linkDiv);

                cardDiv.appendChild(cardContentDiv);

                return cardDiv;
            }



        }

        $(document).ready(function() {
            $("#progress").hide();
            $("#search_text").keyup(function() {
                $("#progress").show();
                var search = $(this).val();
                $.ajax({
                    url: api_url,
                    method: "GET",
                    data: {
                        api_key: api_key,
                        q: search
                    },
                    dataType: "json",
                    success: (response) => {
                        $("#progress").hide();
                        $("#search_result").empty();
                        response.forEach(element => {
                            let cat = new Cat(element);
                            $("#search_result").append(cat.getHTMLCard());
                        });

                    },
                    error: (err) => {
                        console.log(err);
                    }
                })
            });
        });
    </script>
</body>

</html>