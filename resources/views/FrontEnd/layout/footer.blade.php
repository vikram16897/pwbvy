<!--Main Footer-->

<footer class="footer-section">
    <div class="container">

        <div class="footer-content pt-5 pb-5" style="padding-top:50px;padding-bottom:50px; ">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-50" style="margin-bottom: 20px;">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ url('/') }}"><img
                                    src="assets/uploads/master/logo/logo.png" class="img-fluid"
                                    alt="Pragativad Bal Vikas Yojana"></a>
                        </div>
                        <div class="footer-text">
                            <p>Prgativad Bal Vidyalaya is being set up in rural areas across all districts of Bihar under the Prgativad Bal Vikas Yojana. To operate them, one female Sewika and one shahayika are appointed in each ward, along with a supervisor in every block. The recruitment process has started contact the office for application forms.</p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30" style="margin-bottom: 20px;">
                    <div class="footer-widget-heading">
                        <h3>Useful Links</h3>
                    </div>
                    <div class="footer-widget">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route("FrontEnd_about") }}">About Us</a></li>
                            <li><a href="{{ route("FrontEnd_about_volunteer") }}">Our Team</a></li>
                            <li><a href="{{ route("FrontEnd_about_chairman") }}">Director</a></li>
                            <li><a href="{{ route("FrontEnd_about_mission") }}">Mission Vision & Values</a></li>
                            <li><a href="{{ route("FrontEnd_Projects") }}">Our Projects</a></li>
                            <li><a href="{{ route("FrontEnd_Gallery") }}">Gallery</a></li>
                            <li><a href="{{ route("FrontEnd_termsCondition") }}">Terms & Condition</a></li>
                            <li><a href="{{ route("FrontEnd_Donate") }}">Donate Now</a></li>
                            <li><a href="{{ route("admin_dashboard") }}">Office Login</a></li>
                            <li><a href="{{ url('https://soft.pwbvyindia.org/') }}">Arthik Samridhi Yojana</a></li>
                            <li><a href="https://pwbvyindia.org/pwbvy/software">Scholership Admin</a></li>
                            <li><a href="{{ route("FrontEnd_donation_refund_policy") }}">Refund Policy</a></li>
                            <li><a href="{{ route("FrontEnd_annual_report") }}">Annual Report</a></li>
                            <li><a href="{{ url('https://soft.pwbvyindia.org/')}}" target="_blank">Aarthik Samridhi Yojana</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 mb-50" style="margin-top: 30px;">
                    <div class="footer-widget">

                        <div class="contact-box">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="footer-widget-heading">
                                        <h3>Contact</h3>
                                    </div>
                                    <div><span>Email:</span><br> <a
                                            href="mailto:info@pwbvyindia.org"><span class="icon fa fa-envelope"></span> info@pwbvyindia.org</a></div>
                                    <div><span>Mobile number:</span><br> <a href="tel:+91 7667264045"><span class="icon fa fa-phone"></span> +91 7667264045</a>
                                        , <a href="tel:+91 7255965354"><span class="icon fa fa-phone"></span> +91 7255965354</a></div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-12">
                                    <div class="footer-widget-heading">
                                        <h3>Address</h3>
                                    </div>
                                    <div>
                                        <div>
                                            <span><span class="flaticon-house"></span> Registered office :</span>
                                            <a href="https://maps.app.goo.gl/EFVU7aLhFh7FEYTp8">Old Court Compound,
                                                Kashmere Gate, Delhi-110006</a>
                                        </div>
                                        <div>
                                            <span><span class="flaticon-house"></span> Corporate Office :</span>
                                            <a href="#">309 3Rd Floor Aadarsh Complex Wazirpur Indisturial Area
                                                Delhi 110052</a>
                                        </div>
                                        <div>
                                            <span><span class="flaticon-house"></span> Head office in Bihar :</span>
                                            <a href="https://maps.app.goo.gl/dLL5ubsT8TvkAU1M9">Supaul Near Supaul
                                                Block, Bihar 852131 </a>
                                        </div>
                                        <div>
                                            <span><span class="flaticon-house"></span> Branch office in Bihar :</span>
                                            <a href="https://maps.app.goo.gl/3Wf5MeZddtdhB82G6">Phulparas Bus Stand Madhubani, Bihar 847211</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2024, All Right Reserved <a href="{{ url('/') }}">Pragativad Bal  Vikas Yojana</a>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 d-none d-lg-block text-center">
                  {{--  <div class="footer-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route("FrontEnd_about") }}">About</a></li>
                            <li><a href="{{ route("FrontEnd_termsCondition") }}">Terms & Condition</a></li>
                            <li><a href="{{ route("FrontEnd_Gallery") }}">Gallery</a></li>
                            <li><a href="{{ route("FrontEnd_Projects") }}">Our Projects</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Footer-->

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span>
</div>



<script src="assets/site_assets/js/revolution.min.js"></script>
<script src="assets/site_assets/js/jquery.fancybox.pack.js"></script>
<script src="assets/site_assets/js/jquery.fancybox-media.js"></script>
<script src="assets/site_assets/js/owl.js"></script>
<script src="assets/site_assets/js/appear.js"></script>
<script src="assets/site_assets/js/wow.js"></script>
<script src="assets/site_assets/js/jquery-ui.js"></script>
<script src="assets/site_assets/js/script.js"></script>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "280px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<!-- Sweet Alerts js -->
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="assets/js/pages/sweet-alerts.init.js"></script>


<script>
    function sweetalert(msg, type2) {

        if (type2 == 'success') {
            title2 = "SUCCESS!";
        } else if (type2 == 'warning') {
            title2 = "WARNING!";
        } else if (type2 == 'error') {
            title2 = "ERROR!";
        } else {
            title2 = "MESSAGE!";
        }
        Swal.fire({
            title: title2,
            html: msg,
            type: type2,
            showConfirmButton: true,
            timer: 5000
        });
    }
</script>

<script>
    $(document).ready(function () {
        var hideDiv = $('#hideDiv');
        hideDiv.show();
        setTimeout(function () {
            hideDiv.hide();
        }, 2500);
    });
</script>
@if(Route::current()->getName() == "FrontEnd_Pwbvy_center")
<script>
    $(document).ready(function () {
        // Initially hide the names tbody
        $('#names').hide();

        // When the input value changes
        $('#searchInput').on('input', function () {
            // Check if the input value is not null
            if ($(this).val().trim() !== '') {
                // If not null, hide branchdata and show names
                $('#branchdata').hide();
                $('#names').show();
            } else {
                // If null, hide names
                $('#names').hide();

                // Show branchdata
                $('#branchdata').show();
            }
        });
    });
</script>

<script type="text/javascript">
    function filter() {
      // Access text value and elements from the DOM
      let value = document.getElementById("searchInput").value.toUpperCase();
      let names = document.getElementById("names");
      let rows = names.getElementsByTagName("tr");

      // Code continues
      for (let i = 0; i < rows.length; i++) {
        let nameColumn = rows[i].getElementsByTagName("td")[5];
        let ageColumn = rows[i].getElementsByTagName("td")[6];
        // let languageColumn = rows[i].getElementsByTagName("td")[2];

        let name = nameColumn.textContent.toUpperCase();
        let age = ageColumn.textContent.toUpperCase();
        // let language = languageColumn.textContent.toUpperCase();

        let nameMatch = name.indexOf(value) > -1;
        let ageMatch = age.indexOf(value) > -1;
        // let languageMatch = language.indexOf(value) > -1;
        rows[i].style.display = nameMatch || ageMatch ? "" : "none";
        //  || languageMatch
      }
    }

    document.getElementById("searchInput").addEventListener("keyup", filter);
  </script>
@endif

{{--
@if (Route::current()->getName() == 'FrontEnd_Donate')
<script>
    const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");


nextBtn.addEventListener("click",()=> {
    var email=document.getElementById("email");
    validateEmail(email);
    if (!validateEmail){
        alert("email is invalid");
    }
    allInput.forEach(input => {
        if(input.value != ""){
            form.classList.add('secActive');
        }else{
            form.classList.remove('secActive');
            // alert("input is empty")
        }
    })
})

function validateEmail(email){
    var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    return emailPattern.test(email);
}

backBtn.addEventListener("click", () => form.classList.remove('secActive'));
</script>
@endif --}}

</body>

</html>
