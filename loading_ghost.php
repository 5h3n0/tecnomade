<?php
include ("connect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


    <style>
        
.loadingscreen{
  position: absolute;
  display: block;
  top: 116px;
  height: 94vh;
  width: 100%;
  background: #000000db;
  z-index: 999;
}

#page {
  width: 590px;
    height: 590px;
    border: 1px solid transparent;
    border-radius: 50%;
    margin-top: 20%;
    margin-left: 40%;
    font-size: 28pt;
    position: absolute;
}

#container {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}

#h3 {
  color: white;
}

.ring {
  width: 590px;
  height: 590px;
  border: 1px solid transparent;
  border-radius: 50%;
  position: absolute;
}

.ring:nth-child(1) {
  border-bottom:20px solid #00917e;
  animation: rotate1 2s linear infinite;
}

@keyframes rotate1 {
  from {
    transform: rotateX(50deg) rotateZ(110deg);
  }

  to {
    transform: rotateX(50deg) rotateZ(470deg);
  }
}

.ring:nth-child(2) {
  border-bottom: 20px solid #00917e;
  animation: rotate2 2s linear infinite;
}

@keyframes rotate2 {
  from {
    transform: rotateX(20deg) rotateY(50deg) rotateZ(20deg);
  }

  to {
    transform: rotateX(20deg) rotateY(50deg) rotateZ(380deg);
  }
}

.ring:nth-child(3) {
  border-bottom: 20px solid #00917e;
  animation: rotate3 2s linear infinite;
}

@keyframes rotate3 {
  from {
    transform: rotateX(40deg) rotateY(130deg) rotateZ(450deg);
  }

  to {
    transform: rotateX(40deg) rotateY(130deg) rotateZ(90deg);
  }
}

.ring:nth-child(4) {
  border-bottom:20px solid #00917e;
  animation: rotate4 2s linear infinite;
}

@keyframes rotate4 {
  from {
    transform: rotateX(70deg) rotateZ(270deg);
  }

  to {
    transform: rotateX(70deg) rotateZ(630deg);
  }
}
    </style>

    
    <div class="loadingscreen" style="display: none;">
                <div id="page">
                <div id="container">
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div id="h3">loading...</div>
                </div>
        </div>
    </div>
