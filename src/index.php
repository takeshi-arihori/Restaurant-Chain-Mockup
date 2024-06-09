<?php
echo "<html>
<head>
    <script>
        function changeColor() {
            var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
            var random_color = colors[Math.floor(Math.random() * colors.length)];
            document.getElementById('hello').style.color = random_color;
        }
    </script>
</head>
<body>
    <h1 id='hello' style='text-shadow: 2px 2px 4px #000000; font-family: cursive;' onmouseover='changeColor()'>Hello, World!</h1>
</body>
</html>";
