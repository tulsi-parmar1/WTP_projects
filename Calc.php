<?php
session_start();
if(!isset($_SESSION['user_id'])){
    // user is NOT logged in
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculator</title>
    <style>
      body {
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "Poppins", sans-serif;
        background: linear-gradient(135deg, #ffb347, #4caf50);
      }

      .calculator {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        text-align: center;
        width: 300px;
      }

      h2 {
        color: white;
        margin-bottom: 10px;
        letter-spacing: 1px;
        font-weight: 600;
      }

      input {
        width: 100%;
        height: 60px;
        font-size: 1.4em;
        text-align: right;
        margin-bottom: 20px;
        border: none;
        border-radius: 12px;
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        color: #333;
        outline: none;
        box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .btn-container {
        display: grid;
        grid-template-columns: repeat(4, 65px);
        justify-content: center;
        gap: 10px;
      }

      button {
        height: 60px;
        font-size: 1.2em;
        font-weight: bold;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: 0.15s ease-in-out;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
      }

      button:active {
        transform: scale(0.95);
        box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.2);
      }

      .top-btn {
        background-color: #ff9800;
        color: white;
      }

      .operator {
        background-color: #81c784;
        color: white;
      }

      .equal {
        background-color: #4caf50;
        color: white;
        grid-column: span 2;
      }

      button:hover {
        opacity: 0.85;
      }

      .back-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: rgba(255, 152, 0, 0.9);
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1em;
        transition: 0.2s;
      }

      .back-btn:hover {
        background-color: #e68900;
      }
    </style>
  </head>

  <body>
    <button class="back-btn" onclick="history.back()">← Back</button>

    <div class="calculator">
      <h2>Basic Calculator</h2>
      <input type="text" id="display" readonly />

      <div class="btn-container">
        <button class="top-btn" onclick="clearDisplay()">C</button>
        <button class="top-btn" onclick="deleteLast()">DEL</button>
        <button class="operator" onclick="appendValue('%')">%</button>
        <button class="operator" onclick="appendValue('/')">÷</button>

        <button onclick="appendValue('7')">7</button>
        <button onclick="appendValue('8')">8</button>
        <button onclick="appendValue('9')">9</button>
        <button class="operator" onclick="appendValue('*')">×</button>

        <button onclick="appendValue('4')">4</button>
        <button onclick="appendValue('5')">5</button>
        <button onclick="appendValue('6')">6</button>
        <button class="operator" onclick="appendValue('-')">−</button>

        <button onclick="appendValue('1')">1</button>
        <button onclick="appendValue('2')">2</button>
        <button onclick="appendValue('3')">3</button>
        <button class="operator" onclick="appendValue('+')">+</button>

        <button onclick="appendValue('0')">0</button>
        <button onclick="appendValue('.')">.</button>
        <button class="equal" onclick="calculate()">=</button>
      </div>
    </div>

    <script>
      const display = document.getElementById("display");

      function appendValue(value) {
        display.value += value;
      }

      function clearDisplay() {
        display.value = "";
      }

      function deleteLast() {
        display.value = display.value.slice(0, -1);
      }

      function calculate() {
        try {
          display.value = eval(display.value);
        } catch {
          display.value = "Error";
        }
      }

      // ✅ Keyboard and Numpad support
      window.addEventListener("keydown", (e) => {
        const key = e.key;
        const code = e.code;

        if (
          (key >= "0" && key <= "9") ||
          ["+", "-", "*", "/", "%", "."].includes(key)
        ) {
          e.preventDefault();
          appendValue(key);
        } else if (key === "Enter" || key === "=") {
          e.preventDefault();
          calculate();
        } else if (key === "Backspace") {
          e.preventDefault();
          deleteLast();
        } else if (key === "Delete") {
          e.preventDefault();
          clearDisplay();
        } else if (code && code.startsWith("Numpad")) {
          e.preventDefault();
          switch (code) {
            case "Numpad0":
              appendValue("0");
              break;
            case "Numpad1":
              appendValue("1");
              break;
            case "Numpad2":
              appendValue("2");
              break;
            case "Numpad3":
              appendValue("3");
              break;
            case "Numpad4":
              appendValue("4");
              break;
            case "Numpad5":
              appendValue("5");
              break;
            case "Numpad6":
              appendValue("6");
              break;
            case "Numpad7":
              appendValue("7");
              break;
            case "Numpad8":
              appendValue("8");
              break;
            case "Numpad9":
              appendValue("9");
              break;
            case "NumpadDecimal":
              appendValue(".");
              break;
            case "NumpadAdd":
              appendValue("+");
              break;
            case "NumpadSubtract":
              appendValue("-");
              break;
            case "NumpadMultiply":
              appendValue("*");
              break;
            case "NumpadDivide":
              appendValue("/");
              break;
            case "NumpadEnter":
              calculate();
              break;
          }
        }
      });
    </script>
  </body>
</html>
