<?php

require_once './includes/header.php';

?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 m-auto p-3 mt-2">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center">Contact Us</h3>
                    <form action="" method="post">
                        <div class="from-group mb-3">
                            <label for="subject">Subject</label>
                            <input name="subject" id="subject" type="text" class="form-control">
                        </div>
                        <div class="from-group mb-3">
                            <label for="email">Email</label>
                            <input type="email"  id="email" name="email" class="form-control">
                        </div>
                        <div class="from-group mb-3">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="send" class="btn btn-primary" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
 require_once './includes/footer.php';
?>