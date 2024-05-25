<?php
include ("connect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<style>
    
:root {
    --white: #FFF;
    --black: #000;
    --ghost: rgba(105, 253, 216, 1);
    --ghost-light: rgba(174, 254, 233, 1);
    --ghost-highlight: rgba(206, 254, 233, 1);
    --green-dark: #69FDD8;
    --text: #CBFFE8;
    --blush: #EF7384;
  }
  
  
  .ghost {
    width: 400px !important;
    height: 700px !important;
  }
  
 
  .btn {
    color: var(--white);
    background:  var(--blush);
    border-color:  var(--blush);
    border-radius: 20px;
    padding: 8px 50px;
    cursor: pointer;
    font-size: 1em;
    letter-spacing: .1rem;
    font-weight: 400;
    margin: 5px 0px;
      
    &:hover {
      color: black;
      background: var(--ghost);
      border-color:  var(--ghost);
      filter: drop-shadow(0px 0px 10px rgba(105, 253, 216, .5));
      transition: .5s;
    }
  }

  svg#ghostsSVG {
      width: 1220px;
      margin-top: -509px;
      position: relative;
      animation: float 3s ease-in-out infinite;
    }
    
    .msg_of_ghost{
        position: absolute;
        font-size: 28pt;
        rotate: -11deg;
        color: #00917e;
    margin-left: 120px;
    margin-top: -290px;
    z-index: 1;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

</style>

<svg id="ghostsSVG" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 560 375">
                <defs>
                    <filter id="a" color-interpolation-filters="sRGB" x="-50%" y="-50%" height="200%" width="200%">
                        <feOffset in="SourceAlpha" result="SA-offset"></feOffset>
                        <feGaussianBlur in="SA-offset" stdDeviation="12" result="SA-o-blur"></feGaussianBlur>
                        <feComponentTransfer in="SA-o-blur" result="SA-o-b-contIN">
                            <feFuncA type="table" tableValues="0 1 0.65 0.5 0.55 0.6 0.65 0.55 0.4 0.1 0"></feFuncA>
                        </feComponentTransfer>
                        <feComposite operator="in" in="SA-o-blur" in2="SA-o-b-contIN" result="SA-o-b-cont"></feComposite>
                        <feComponentTransfer in="SA-o-b-cont" result="SA-o-b-c-sprd">
                            <feFuncA type="linear"></feFuncA>
                        </feComponentTransfer>
                        <feColorMatrix in="SA-o-b-c-sprd" values="0 0 0 0 0.412 0 0 0 0 0.992 0 0 0 0 0.847 0 0 0 1 0" result="SA-o-b-c-s-recolor"></feColorMatrix>
                        <feTurbulence result="fNoise" type="fractalNoise" numOctaves="6" baseFrequency="1.98"></feTurbulence>
                        <feColorMatrix in="fNoise" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 7 -3" result="clipNoise"></feColorMatrix>
                        <feComposite operator="arithmetic" in="SA-o-b-c-s-recolor" in2="clipNoise" k1=".04" k2="1" result="SA-o-b-c-s-r-mix"></feComposite>
                        <feMerge>
                            <feMergeNode in="SA-o-b-c-s-r-mix"></feMergeNode>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                        </feMerge>
                    </filter>
                    <filter id="b" color-interpolation-filters="sRGB" x="-50%" y="-50%" height="200%" width="200%">
                        <feOffset in="SourceAlpha" result="SA-offset"></feOffset>
                        <feGaussianBlur in="SA-offset" stdDeviation="7" result="SA-o-blur"></feGaussianBlur>
                        <feComponentTransfer in="SA-o-blur" result="SA-o-b-contIN">
                            <feFuncA type="table" tableValues="0 1 0.65 0.5 0.55 0.6 0.65 0.55 0.4 0.1 0"></feFuncA>
                        </feComponentTransfer>
                        <feComposite operator="in" in="SA-o-blur" in2="SA-o-b-contIN" result="SA-o-b-cont"></feComposite>
                        <feComponentTransfer in="SA-o-b-cont" result="SA-o-b-c-sprd">
                            <feFuncA type="linear" slope="3.8"></feFuncA>
                        </feComponentTransfer>
                        <feColorMatrix in="SA-o-b-c-sprd" values="0 0 0 0 0.412 0 0 0 0 0.992 0 0 0 0 0.847 0 0 0 1 0" result="SA-o-b-c-s-recolor"></feColorMatrix>
                        <feTurbulence result="fNoise" type="fractalNoise" numOctaves="6" baseFrequency="1.98"></feTurbulence>
                        <feColorMatrix in="fNoise" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 7 -3" result="clipNoise"></feColorMatrix>
                        <feComposite operator="arithmetic" in="SA-o-b-c-s-recolor" in2="clipNoise" k1=".04" k2=".96" result="SA-o-b-c-s-r-mix"></feComposite>
                        <feMerge>
                            <feMergeNode in="SA-o-b-c-s-r-mix"></feMergeNode>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                        </feMerge>
                    </filter>
                    <filter id="c" color-interpolation-filters="sRGB" x="-50%" y="-50%" height="200%" width="200%">
                        <feOffset in="SourceAlpha" result="SA-offset"></feOffset>
                        <feGaussianBlur in="SA-offset" stdDeviation="4" result="SA-o-blur"></feGaussianBlur>
                        <feComponentTransfer in="SA-o-blur" result="SA-o-b-contIN">
                            <feFuncA type="table" tableValues="0 1 0.65 0.5 0.55 0.6 0.65 0.55 0.4 0.1 0"></feFuncA>
                        </feComponentTransfer>
                        <feComposite operator="in" in="SA-o-blur" in2="SA-o-b-contIN" result="SA-o-b-cont"></feComposite>
                        <feComponentTransfer in="SA-o-b-cont" result="SA-o-b-c-sprd">
                            <feFuncA type="linear" slope="2"></feFuncA>
                        </feComponentTransfer>
                        <feColorMatrix in="SA-o-b-c-sprd" values="0 0 0 0 0.412 0 0 0 0 0.992 0 0 0 0 0.847 0 0 0 1 0" result="SA-o-b-c-s-recolor"></feColorMatrix>
                        <feTurbulence result="fNoise" type="fractalNoise" numOctaves="6" baseFrequency="1"></feTurbulence>
                        <feColorMatrix in="fNoise" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 7 -3" result="clipNoise"></feColorMatrix>
                        <feComposite operator="arithmetic" in="SA-o-b-c-s-recolor" in2="clipNoise" k1=".08" k2=".75" result="SA-o-b-c-s-r-mix"></feComposite>
                        <feMerge>
                            <feMergeNode in="SA-o-b-c-s-r-mix"></feMergeNode>
                            <feMergeNode in="SourceGraphic"></feMergeNode>
                        </feMerge>
                    </filter>
                </defs>
            <g id="ghost-all">
                <g fill="var(--ghost)" filter="url(#a)">
                    <path class="ghost body-outline" d="M141.7 310.8c-8 0-17.7-6.6-6.5-20.2s13.8-17.2 13.8-17.2c13.5-15.5 13.9-49.2 12.9-59.8-1-10.6-8.8-67 9.5-92.2 15.5-25.6 36.1-32 61.7-31.9 31.5 1.2 48 22.6 52.6 34.6 0 0 21.6 38.4 4.3 107-16.2 64.1-36.4 70.6-51.9 58.8 0 0-6.6-5.1-16.8 6.9-7.5 8.7-20.7 15.5-25.5 7.4 0 0-7.7-13.6-26.4-3.4.1-.1-20.4 10-27.7 10z"></path>
                    <path class="ghost arms" d="M171.2 189.7c-.2 6.7-42 4.5-47.7-18.5-1.2-4-4.9-6.8-9.3-6.8-5.4 0-9.7 4.4-9.7 9.7 0 1.1.2 2.2.5 3.2 9.4 31.9 47.9 36.2 72.1 64.7M293.1 199.1c1.8 10.9 14.2 35.1 41.3 32.6 4.1-.2 8.1 2.4 9.5 6.5 1.8 5.1-.9 10.7-5.8 12.5-1.1.3-2.1.5-3.2.5-15.7.7-36-5.3-47.7-19.5"></path>
                    <path class="ghost-left thumb-right" d="M332 233.5s2.8-6-.4-6.8c-3.2-.8-8.8 1.8-8.1 8.7.7 6.9 8.5-1.9 8.5-1.9"></path>
                </g>
                
                <path class="ghost-bright-highlight" fill="rgba(255,255,255,.6)" d="M200.5 283.2c7.7 7 15.5-.9 21.9-8.4 8.8-10.3 14.4-6 14.4-6 13.3 10.2 30.6 4.6 44.6-50.7 14.9-59.2-3.7-87-3.7-87-4.7-7.8-12.4-22.7-36.5-29.7l-.3-.5c23.4 3.2 33.1 17.5 39.4 29.3 0 0 18.5 33.1 3.7 92.3-13.9 55.3-31.2 60.9-44.6 50.7 0 0-5.7-4.4-14.4 6-6.4 7.5-14.2 13.4-21.9 6.4l-2.6-2.4z" filter="url(#b)"></path>
            <g id="sign">
                <path class="sign" d="M165.8 136.9l-11-66.3c-.5-3.2-3.8-6.6-6.6-6.1L30 84.3c-4 .8-5.5 5-5 8.2l11.1 66.2c.5 3.2 3.2 5.5 6 5l59.6-10 7.6 50.2 7.4-1.1-7.7-50.4 52.6-8.8c2.9-.5 4.7-3.5 4.2-6.7z" fill="#adadad"></path>
                <path class="sign" fill="#fff" d="M167.7 134.8l-11-66.3c-.5-3.2-3.2-5.5-6-5L31 83.7c-2.8.5-4.6 3.5-4.1 6.7L38 156.6c.5 3.2 3.2 5.5 6 5l59.6-10 7.6 50.2 7.4-1.1-7.7-50.4 52.6-8.8c2.9-.5 4.7-3.5 4.2-6.7z"></path>
                <path class="sign" d="M111.2 201.8l7.4-1.1-1.9 2.1-7.4 1.1 1.9-2.1z" fill="#bfbfbf"></path>
                
                </g><!-- /#sign -->
                <path class="ghost sign--thumb" fill="var(--ghost)" d="M114.7 170.9s-5.8-3.2-6.8 0 1.3 8.9 8.3 8.6c6.8-.4-1.5-8.6-1.5-8.6"></path>
                <path class="ghost arm-highlights" fill="var(--ghost-light)" d="M160.7 202.3c1.3 0-.1-6.5-.1-6.5-30.4 1.1-39.9-23.3-39.9-23.3s-1.2-2-4.6-2.1c0 0 .3 2.3-1.7 2.1-1.7-.2-3.9-1.2-4.5-.1-.7 1.1.5 5.2 5 5.3 0 0 2.1 0 3.2-.6 0 0 12.7 23.5 41.6 25.3h1zM293.9 210.1l-.9 7.7s9.5 22.2 44.1 22.7h4.7c0-1.1-.9-3.9-3.4-5.7-2.4-1.8-8.2-1.5-8.2-1.5 2.4-4 .5-5.5-1.9-4.8-2.9.9-3.2 4.8-3.1 4.8-21.7-2-31-22.5-31-22.5"></path>
                <g class="blush" fill="var(--blush)">
                    <ellipse class="ghost blush-left" cx="188.9" cy="169.5" rx="10.4" ry="4.7"></ellipse>
                    <ellipse class="ghost blush-right" cx="266.9" cy="169.5" rx="10.4" ry="4.7"></ellipse>
                </g>
             <g class="ghost mouths" fill="none" stroke-width="5" stroke="black" stroke-linecap="round" stroke-miterlimit="10"> 
                    <path class="ghost mouth--sad" stroke-width="6" stroke="black" fill="none" d="M215.5 177.5c2.3-1.1 7.6-3.1 14.3-2.2 4.1.5 7.3 2 9.2 3.1"></path>
                    
                </g>
                <g id="ghost--eyes">
                    <circle cx="262.4" class="ghost--eye-right" cy="151.2" r="7.5"></circle>
                    <circle cx="192.4" class="ghost--eye-left" cy="151.2" r="7.5"></circle>
                </g><!-- /#ghost-complete -->
                <ellipse class="ghost-shadow" fill="rgba(105,253,216,.5)" cx="182.7" cy="360" rx="120" ry="15" filter="url(#a)"></ellipse>
                
                
            </g></svg>
  
        </div>