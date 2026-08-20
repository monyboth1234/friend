
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<!-- Hearder -->
    <div style="background-color: #407109; height: 40px;" class="w-100 d-flex justify-content-between ps-5 pe-5">
        <div class="d-flex gap-5 mt-2">
            <p class="text-white">Please look </p>
            <p class="text-white">Please request</p>
        </div>    
        <div class="d-flex justify-content-around gap-5">
            <select class="bg-transparent border-0 text-white" name="" id="">
                <option value="">English</option>
                <option value="">Khmer</option>
                <option value="">Loa</option>
            </select>
            <select class="bg-transparent border-0 text-white" name="" id="">
                <option value="">USD</option>
                <option value="">Rial</option>
                <option value="">Dung</option>
            </select>
        </div>
    </div>


    <div class="position-relative">

        <img src="https://i.pinimg.com/1200x/e9/b1/67/e9b16750a87a69e8d182899c1a3fed8d.jpg" class="w-100" style="height:400px; object-fit:cover;">
        
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>

        <div class="position-absolute top-0 start-0 w-100 mt-3">

            <div class="container d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center gap-3">

                     <img width="150" src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9" alt="">

                    <a href="#" class="text-white text-decoration-none me-4">Home</a>
                    <a href="#" class="text-white text-decoration-none me-4">Shop</a>
                    <a href="#" class="text-white text-decoration-none me-4">About</a>
                    <a href="#" class="text-white text-decoration-none me-4">Pages</a>
                    <a href="#" class="text-white text-decoration-none me-4">Blog</a>
                    <a href="#" class="text-white text-decoration-none">Contact</a>

                </div>

                <div class="d-flex align-items-center">

                    <input
                        type="search"
                        class="form-control me-2"
                        placeholder="Type Here..."
                        style="width:220px;">

                    <button class="btn btn-warning me-4">
                        Search
                    </button>

                    <a href="/Demo_project//admin//dashboard//dashborads.php" class="text-white text-decoration-none me-3 btn bg-primary ">
                        Dashboard
                    </a>

                   <a href="{{ route('register') }}" class="text-white text-decoration-none me-4">
                        Register
                    </a>
                    <a href="{{ route ('login')}}" class="text-white text-decoration-none">
                        login
                    </a>
                </div>
        </div>
    </div>

    <!-- Center Text -->
    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">

        <h1 class="fw-bold">Shop</h1>

        <p class="mb-0">
            Home / Shop
        </p>

    </div>

</div>

    <!-- Feature -->

    <div>
        <h2 style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif" class="text-center mt-5 text-warning">Kind of Healthy</h2>
        <h1 class="text-center fw-bold" style="color:#407109">Shop Out Organic Product</h1>
    </div>


    <!-- Card -->
     <div class="row d-flex p-5 justify-content-between">
        <div class="col col-lg-2 card border-0 ">
            <img  style="border-radius: 100%;" width="250" src="https://i.pinimg.com/1200x/17/51/39/175139fee4ab5050c15347f075f0abe0.jpg" alt="">
            <a href="" class="btn fw-bold">Vegetables</a>
        </div>
        <div class="col col-lg-2 card border-0  ">
            <img  style="border-radius: 100%;" width="250" src="https://i.pinimg.com/736x/87/5c/19/875c19f4c3aff56b51416c2295f13145.jpg" alt="">
            <a href="" class="btn fw-bold">Fruits</a>
        </div>
        <div class="col col-lg-2 card border-0  ">
            <img  style="border-radius: 100%;" width="250" src="https://i.pinimg.com/1200x/02/f1/52/02f1527da53638f41faca5deeb929d91.jpg" alt="">
            <a href="" class="btn fw-bold">Fresh Nuts</a>
        </div>
        <div class="col col-lg-2 card border-0 ">
            <img  style="border-radius: 100%;" width="250" src="https://i.pinimg.com/736x/b2/96/dc/b296dce2446cf3cb91b52dc058197e09.jpg" alt="">
            <a href="" class="btn fw-bold">Juices</a>
        </div>
        <div class="col col-lg-2 card border-0 ">
            <img  style="border-radius: 100%;" width="250" src="https://i.pinimg.com/736x/1b/3e/0b/1b3e0b856b8937e09353290c7f9e3f88.jpg" alt="">
            <a href="" class="btn fw-bold">Eggs</a>
        </div>
     </div><br>


     <!-- Ruler line -->
     <div class="w-100">
        <div class="p-5">
            <hr class="border-2 text-secondary">
        </div>
     </div><br><br>


     <!-- Product Card -->
{{-- 
<div class="container my-5">
    <!-- Responsive Row using Bootstrap grid -->
    <div class="row g-4 justify-content-center">

        <?php while($row = $vegatable->fetch_assoc()): ?>

            <!-- The loop now generates a new column/card for every individual product -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow position-relative p-3">
                    
                    <!-- Product Image Container -->
                    <div class="text-center">
                       <img width="200" src="/Demo_project/admin/Vegetable/<?= $row['p_image'] ?>">
                    </div>

                    <!-- Discount / Weight Badge Overlay -->
                    <div class="position-absolute top-0 start-0 ps-3 pt-3">
                        <span class="badge bg-success fw-bold"><?= $row['p_descount'] ?> Kg</span>
                    </div>
                    
                    <!-- Product Details -->
                    <div class="card-body px-0 pt-3">
                        <p class="fw-bold mb-1">Vegetable: <?= $row['p_title'] ?> </p>
                        <p class="text-muted mb-1">Category: <?= $row['p_category'] ?> </p>
                        <p class="fw-bold text-success mb-0">Price: $<?= $row['p_price'] ?> </p>
                    </div>

                </div>
            </div>

        <?php endwhile; ?>

    </div>
</div> --}}
       




    <!-- Footer -->
     <div style="background-color: #0E4A32;" class="w-100 p-5 h-100 ">
        <div class="d-flex justify-content-center gap-5 ">
            <div class="">
                <img width="150" src="https://imgs.search.brave.com/WHOTEWAyl_rVGfQLADYZphKn4_KapBRnncpI16sYU0Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTEz/MjM2MDM2NC92ZWN0/b3IvdmVjdG9yLWdy/ZWVuLWVtYmxlbS1m/YXJtLWZyZXNoLXdp/dGgtZGVjb3JhdGl2/ZS1sZWF2ZXMtYnJp/Z2h0LWFscGhhYmV0/LWxldHRlcnMtbnVt/YmVycy1hbmQuanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPXl1/UDd2b0JiakZVcExm/eXVLaWp6U2dWcUlz/cjMwdHEzQUR6OFJT/dkZKYXM9" alt="">
            </div>
            <div>
                <ul class="list-unstyled text-white d-flex flex-column gap-3">
                    <h3>Useful Pages</h3>
                    <li>About Us</li>
                    <li>Contact</li>
                    <li>Help Conter</li>
                    <li>Career</li>
                    <li>Policy</li>
                    <li>Flash Show</li>
                </ul>
            </div>
            <div>
                <ul class="list-unstyled text-white d-flex flex-column gap-3">
                    <h3>Help Conter</h3>
                    <li>Payment</li>
                    <li>Shopping</li>
                    <li>Product Store</li>
                    <li>FAQ</li>
                    <li>Cheekboot</li>
                    <li>Other Product</li>
                </ul>
            </div>
            <div>
                <ul class="list-unstyled text-white">
                    <h3>Contact</h3>
                    <li><svg style="width:40px; height: 40px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="rgb(233, 238, 243)" d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>Phnom Pehn,Kandal,bongtrobeak<br>271,spain</li><br>
                    <li><svg style="width:35px; height: 35px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="rgb(233, 238, 243)" d="M224.2 89C216.3 70.1 195.7 60.1 176.1 65.4L170.6 66.9C106 84.5 50.8 147.1 66.9 223.3C104 398.3 241.7 536 416.7 573.1C493 589.3 555.5 534 573.1 469.4L574.6 463.9C580 444.2 569.9 423.6 551.1 415.8L453.8 375.3C437.3 368.4 418.2 373.2 406.8 387.1L368.2 434.3C297.9 399.4 241.3 341 208.8 269.3L253 233.3C266.9 222 271.6 202.9 264.8 186.3L224.2 89z"/></svg>(+885), 666 888, 999/<br>776, 987, 000</li><br>
                    <li><svg style="width:35px; height: 35px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="rgb(233, 238, 243)" d="M112 128C85.5 128 64 149.5 64 176C64 191.1 71.1 205.3 83.2 214.4L291.2 370.4C308.3 383.2 331.7 383.2 348.8 370.4L556.8 214.4C568.9 205.3 576 191.1 576 176C576 149.5 554.5 128 528 128L112 128zM64 260L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 260L377.6 408.8C343.5 434.4 296.5 434.4 262.4 408.8L64 260z"/></svg>farming@gmail.com</li>
                </ul>
            </div>
            <div>
                <ul class="list-unstyled text-white d-flex flex-column gap-3">
                    <h3>Store Information</h3>
                    <li>Save Information</li>
                    <li>About Store</li>
                    <li>Return</li>
                    <li>last Product</li>
                    <li>New Product</li>
                    <li>Safe Product</li>
                </ul>
            </div>
            <div>
                <ul class="list-unstyled text-white d-flex flex-column gap-3 ">
                    <h3>Download App</h3>
                    <img width="250" src="/Demo_project//picher//1.png" alt="">
                    <img width="250" src="/Demo_project//picher//2.png" alt="">
                </ul>
            </div>
        </div>
        <div>
            <hr class="text-light border-3">
            <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <a href="#" class="text-white text-decoration-none">Home</a>
                        <span class="text-secondary mx-3">|</span>

                        <a href="#" class="text-white text-decoration-none">Shop</a>
                        <span class="text-secondary mx-3">|</span>

                        <a href="#" class="text-white text-decoration-none">About</a>
                        <span class="text-secondary mx-3">|</span>

                        <a href="#" class="text-white text-decoration-none">Pages</a>
                        <span class="text-secondary mx-3">|</span>

                        <a href="#" class="text-white text-decoration-none">Blog</a>
                        <span class="text-secondary mx-3">|</span>

                        <a href="#" class="text-white text-decoration-none">Contact Us</a>
                    </div>

                    <div>
                        <svg class="ms-5" style="width:40px; height: 40px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="rgb(233, 238, 243)" d="M576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 440 146.7 540.8 258.2 568.5L258.2 398.2L205.4 398.2L205.4 320L258.2 320L258.2 286.3C258.2 199.2 297.6 158.8 383.2 158.8C399.4 158.8 427.4 162 438.9 165.2L438.9 236C432.9 235.4 422.4 235 409.3 235C367.3 235 351.1 250.9 351.1 292.2L351.1 320L434.7 320L420.3 398.2L351 398.2L351 574.1C477.8 558.8 576 450.9 576 320z"/></svg>
                        <svg class="ms-2" style="width:40px; height: 40px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="rgb(233, 238, 243)" d="M523.4 215.7C523.7 220.2 523.7 224.8 523.7 229.3C523.7 368 418.1 527.9 225.1 527.9C165.6 527.9 110.4 510.7 64 480.8C72.4 481.8 80.6 482.1 89.3 482.1C138.4 482.1 183.5 465.5 219.6 437.3C173.5 436.3 134.8 406.1 121.5 364.5C128 365.5 134.5 366.1 141.3 366.1C150.7 366.1 160.1 364.8 168.9 362.5C120.8 352.8 84.8 310.5 84.8 259.5L84.8 258.2C98.8 266 115 270.9 132.2 271.5C103.9 252.7 85.4 220.5 85.4 184.1C85.4 164.6 90.6 146.7 99.7 131.1C151.4 194.8 229 236.4 316.1 240.9C314.5 233.1 313.5 225 313.5 216.9C313.5 159.1 360.3 112 418.4 112C448.6 112 475.9 124.7 495.1 145.1C518.8 140.6 541.6 131.8 561.7 119.8C553.9 144.2 537.3 164.6 515.6 177.6C536.7 175.3 557.2 169.5 576 161.4C561.7 182.2 543.8 200.7 523.4 215.7z"/></svg>
                        <svg class="ms-2" style="width:40px; height: 40px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="rgb(233, 238, 243)" d="M581.7 188.1C575.5 164.4 556.9 145.8 533.4 139.5C490.9 128 320.1 128 320.1 128C320.1 128 149.3 128 106.7 139.5C83.2 145.8 64.7 164.4 58.4 188.1C47 231 47 320.4 47 320.4C47 320.4 47 409.8 58.4 452.7C64.7 476.3 83.2 494.2 106.7 500.5C149.3 512 320.1 512 320.1 512C320.1 512 490.9 512 533.5 500.5C557 494.2 575.5 476.3 581.8 452.7C593.2 409.8 593.2 320.4 593.2 320.4C593.2 320.4 593.2 231 581.8 188.1zM264.2 401.6L264.2 239.2L406.9 320.4L264.2 401.6z"/></svg>
                        <svg class="ms-2" style="width:40px; height: 40px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="rgb(233, 238, 243)" d="M544.5 273.9C500.5 274 457.5 260.3 421.7 234.7L421.7 413.4C421.7 446.5 411.6 478.8 392.7 506C373.8 533.2 347.1 554 316.1 565.6C285.1 577.2 251.3 579.1 219.2 570.9C187.1 562.7 158.3 545 136.5 520.1C114.7 495.2 101.2 464.1 97.5 431.2C93.8 398.3 100.4 365.1 116.1 336C131.8 306.9 156.1 283.3 185.7 268.3C215.3 253.3 248.6 247.8 281.4 252.3L281.4 342.2C266.4 337.5 250.3 337.6 235.4 342.6C220.5 347.6 207.5 357.2 198.4 369.9C189.3 382.6 184.4 398 184.5 413.8C184.6 429.6 189.7 444.8 199 457.5C208.3 470.2 221.4 479.6 236.4 484.4C251.4 489.2 267.5 489.2 282.4 484.3C297.3 479.4 310.4 469.9 319.6 457.2C328.8 444.5 333.8 429.1 333.8 413.4L333.8 64L421.8 64C421.7 71.4 422.4 78.9 423.7 86.2C426.8 102.5 433.1 118.1 442.4 131.9C451.7 145.7 463.7 157.5 477.6 166.5C497.5 179.6 520.8 186.6 544.6 186.6L544.6 274z"/></svg>                    
                    </div>
                    <div>
                        <h3 class="fw-bold text-light">WWW.DownloadNewThemes.com</h3>
                    </div>
                    <div>
                        <img width="300" src="/Demo_project//picher//Gemini_Generated_Image_9l7xhr9l7xhr9l7x.png" alt="">
                    </div>
             </div>
            <hr class="text-light border-3">
        </div>
     </div>
     <div class="d-flex justify-content-between mt-3 ps-5 pe-5">
        <p class="fw-bold">@ 2026 Farming Manager Store. All Right Reserved</p>
        <p class="fw-bold">Terms and Conditional  |  Privacy Policy</p>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>