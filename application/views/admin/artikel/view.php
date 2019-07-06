<?php 
$this->load->view('template/frontend/head');
$this->load->view('template/frontend/navigation');

?>
    
         <!-- Page title -->
        <div class="page-title">
              <h1><?php echo $art_item['judul']?></h1>

        </div>
        <!-- Artikel -->
          <div class="section-container">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12 tentangkami section-description wow fadeIn">
                      <h2><?php echo $art_item['judul']?></h2>
                      <div class="divider-1 wow fadeInUp"><span></span></div>
                      <p>
                        <?php echo $art_item['deskripsi']?>
                      </p>
                      <br></br>
                      <br></br>
                      <br></br>
                      <br></br>
                      <br></br>
                  </div>
              </div>
          </div>
        </div>
        
        
    <!-- Contact us (block 2) -->
        <div class="block-2-container section-container contact-container">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12 block-2 section-description wow fadeIn">
                    <h2>Contact us</h2>r
                    <div class="divider-1 wow fadeInUp"><span></span></div>
                      <p>
                        Untuk segala pertanyaan, informasi atau antar wisata. Kamu dapat mengirimkan e mail atau datang lansung ke kantor!
                      </p>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-4 block-2-box block-2-left contact-form wow fadeInLeft">
                  <h3>Email us</h3>
                      <form role="form" action="assets/contact.php" method="post">
                        <div class="form-group">
                          <label class="sr-only" for="contact-email">Email</label>
                            <input type="text" name="email" placeholder="Email..." class="contact-email form-control" id="contact-email">
                          </div>
                          <div class="form-group">
                            <label class="sr-only" for="contact-subject">Subject</label>
                            <input type="text" name="subject" placeholder="Subject..." class="contact-subject form-control" id="contact-subject">
                          </div>
                          <div class="form-group">
                            <label class="sr-only" for="contact-message">Message</label>
                            <textarea name="message" placeholder="Message..." class="contact-message form-control" id="contact-message"></textarea>
                          </div>
                          <button type="submit" class="btn">Send it</button>
                      </form>
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