<aside class="main-sidebar" style="
/* position:absolute;
height: fit-content; */
position:-webkit-sticky
 ">
     <section class="sidebar">
      <div class="user-panel">

         <div class="pull-left image">

            <img src="<?= base_url() ?>assets/images/star.png" class="img-circle profileImgUrl" alt="User Image">
         </div>
         <div class="pull-left info">
            <p class="NameEdt">
               Administrador
            </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
      </div>
       
        <?php $url1 = $this->uri->segment(1);
        $url2 = $this->uri->segment(2);
        ?>
        <ul class="sidebar-menu" data-widget="tree">

        
            <li class="<?php if ($url1 == 'empresas') {
                                echo 'active';
                            } ?>"> <a href="<?= base_url('empresas'); ?>"><i class="fas fa-handshake"></i>
                    <span>Empresas</span>
                </a>
            </li>
          








        </ul>
    </section>
</aside>