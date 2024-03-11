<div>
<div class="contactss" id="contact">
            <div class="contentss">
                <h2>Contact Me</h2>
                <p>You can contact me through mail or phone and you can also send me mail via the chat box</p>
            </div>
            <div class="containerss">
                <div class="contactInfo">
                    <div class="boxes">
                        <div class="iconss"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class="text6">
                            <h3>Address</h3>
                            <p>Sangam Marg 32 <br>Maitidevi,Kathmandu,Nepal</p>
                        </div>
                    </div>
                    <div class="boxes">
                        <div class="iconss"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="text6">
                            <h3>Phone</h3>
                            <p>980-306-2084</p>
                        </div>
                    </div>
                    <div class="boxes">
                        <div class="iconss"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <div class="text6">
                            <h3>Email</h3>
                            <p>akhilesh.sharma@deerwalk.edu.np</p>
                        </div>
                    </div>
                    <h2 class="txttt">Connect through social Media</h2>
                    <ul class="sci">
                        <li><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://www.gmail.com/"><i class="fab fa-envelope"></i></a></li>
                    </ul>
                </div>
                <div class="contactForm">
                    <form action="https://api.web3forms.com/submit" method="POST" onsubmit="return validate()">
                        <h2>Send Message</h2>
                        <input type="hidden" name="access_key" value="82ca395f-d21c-413d-8639-90c10b08b656">
                        <div class="inputBox">
                            <input type="text" name="name" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="email" id="email" required="required">
                            <span>Email</span>
                            <p id="result"></p>
                        </div>
                        <div class="inputBox">
                            <textarea required="required" name="message"></textarea>
                            <span>Write Message...</span>
                        </div>
                        <div class="inputBox">
                            <button class="scanfcode">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script>
    const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };

    const validate = () => {
        const $result = $('#result');
        const email = $('#email').val();
        $result.text('');

        if (validateEmail(email)) {
            $result.text(email + ' is valid.');
            $result.css('color', 'green');
            return true; 
        } else {
            $result.text(email + ' is invalid.');
            $result.css('color', 'red');
            return false; 
        }
    }

    $(document).on('submit', 'form', function(e) {
        if (!validate()) {
            e.preventDefault(); 
        }
    });
</script>
</div>
