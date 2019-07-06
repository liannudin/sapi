<?php 
$this->load->view('template/frontend/head');
$this->load->view('template/frontend/navigation');

?>

       <div class="block-2-container section-container contact-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 block-2 section-description wow fadeIn">
                        <h2>Contact us</h2>
                        <div class="divider-1 wow fadeInUp"><span></span></div>
                        <p>
                            Untuk segala pertanyaan, informasi atau antar wisata. Kamu dapat mengirimkan e mail atau datang lansung ke kantor!
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 block-2-box block-2-left wow fadeInLeft">
                        <h3>Email us</h3>
                   <?php $attributes = array("name" => "contactform");
            echo form_open("/admin/guestbook/index", $attributes);?>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Your Full Name" type="text" value="<?php echo set_value('name'); ?>" />
                <span class="text-white"><?php echo form_error('name'); ?></span>
            </div>
            
            <div class="form-group">
                <label for="email">Email ID</label>
                <input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
                <span class="text-white"><?php echo form_error('email'); ?></span>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input class="form-control" name="subject" placeholder="Subject" type="text" value="<?php echo set_value('subject'); ?>" />
                <span class="text-white"><?php echo form_error('subject'); ?></span>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" rows="4" placeholder="Message"><?php echo set_value('message'); ?></textarea>
                <span class="text-white"><?php echo form_error('message'); ?></span>
            </div>

            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-success">Submit</button>
            </div>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <div class="col-sm-4 block-2-box block-2-right contact-address wow fadeInUp">
                        <h3>Visit us</h3>
                        <p><span aria-hidden="true" class="icon_pin"></span>Yogyakarta, Indonesia</p>
                        <p><span aria-hidden="true" class="icon_phone"></span>Phone: 087 739 659 554</p>
                        <p><span aria-hidden="true" class="icon_mail"></span>Email: <a href="">Lian.nudin@gmail.com</a></p>
                    </div>
                </div>
                <div class="contact-icon-container">
                    <span aria-hidden="true" class="icon_mail"></span>
                </div>
            </div>
        </div>



  <?php 
$this->load->view('template/frontend/footer');

?>      