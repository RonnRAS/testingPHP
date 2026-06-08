<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/html5-qrcode"></script>
    <title>ATTENDANCE OBSIDIAN</title>
</head>
<a href="">logout</a> <br>

<body id="lobby">
    <div class="nav">
        <div id="nav" class="uni1-navbar">

            <h2>ATTENDANCE SHEET</h2>

            <select name="section" id="section" onchange="redirect()">
                <option value="" disabled selected>Select a strand</option>
                <option value="garnet.php">Garnet</option>
                <option value="obsidian.php">Obsidian</option>
                <option value="beryl.php">Beryl</option>
                <option value="turquoise.php">Turquoise</option>
                <option value="section2.php">Section 2</option>
            </select>

            <script>
                function redirect() {
                    var select = document.getElementById("section");
                    var selectedValue = select.value;
                    if (selectedValue) {
                        window.location.href = selectedValue;
                    }
                }
            </script>


            <select name="strand" id="strand">
                <option value="" disabled selected>Select A Strand</option>
                <option value="ICT">ICT</option>
                <option value="STEM">STEM</option>
                <option value="HE">HE</option>
                <option value="GAS">GAS</option>
                <option value="ABM">ABM</option>
            </select>

            <a id="logout" href="logout.php">Logout</a>
        </div>

    </div>
    <div class="container">
        <div class="bobo">

            <table class="box" id="atendanceTable">
                <tr>
                    <th>Student ID</th>
                    <th>-</th>

                </tr>
                <tr id="1. Alquizar, Cart Randel Rodel" row.style.backgroundColor="light green" ;>
                    <td>1. Alquizar, Cart Randel Rodel</td>
                    <td></td>

                </tr>
                <tr id="2. HEDREX BACLAAN SUMUGAT">
                    <td>2. HEDREX BACLAAN SUMUGAT</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    <h3>Scan QR Code:</h3>
    <div id="reader"></div>

    <script>
        function onScanSuccess(decodedText) {
            let parts = decodedText.split("-");
            let studentId = parts[0];
            let expiryDate = new Date(parts[1]);
            let today = new Date();


            if (today > expiryDate) {
                alert("QR Code has expired!");
                return;
            }


            let row = document.getElementById(studentId);
            if (row) {
                let timeNow = new Date().toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });
                row.children[1].innerText = "Present";
                row.children[2].innerText = timeNow;
                row.style.backgroundColor = "light green";
            } else {
                alert("Student not found!");
            }
        }

        let scanner = new Html5QrcodeScanner("reader", {
            fps: 10,
            qrbox: 250
        });
        scanner.render(onScanSuccess);
    </script>
    <video id="interactive" class="viewport" width="100%"></video>
</body>

</html>