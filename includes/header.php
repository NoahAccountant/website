<!-- start header -->
<header>
    <div id="callout">
        <p><i class="fa fa-phone"></i> <a href="tel:+447393182680">07393182680</a></p>
        <p><i class="fa fa-envelope"></i> info@northlondoncarhire.co.uk</p>
    </div>
    <div id="logo">
        <a href="/"><img src="/img/logo.png" /></a>
    </div>
</header>
<!-- end header -->
<div class="clearfix"></div>
<!-- start nav -->
<div class="nav-wrap" id="myHeader">
    <nav class="navigation">
        <div class="nav" nav-menu-style="yoga">
            <ul class="nav-menu" id="menu">
                <li><a href="/"> Home </a> </li>
                <li><a href="/about"> About Us</a> </li>
                <li><a href="/book-now"> Book Now </a> </li>
                <li><a href="/fares"> Fare Prices </a> </li>
                <li><a href="/contact-us"> Contact Us</a> </li>
            </ul>
        </div>
    </nav>
</div>
<!-- end nav -->

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>