
<?php
defined('_JEXEC') or die('Restricted access');

$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_myslideshow/style/style.css');


?>
<script src="modules/mod_myslideshow/js/jquery.min.js" type="text/javascript">jQuery.noConflict();</script>
<script src="modules/mod_myslideshow/js/custom.js" type="text/javascript"></script>




<div id="conteiner">
    <div class="inslider">
        <div class="contentholder">
            <div class="contentslider">
                <div class="content con1">
                    <img src="<?php echo $params->get('image1') ;?>" alt="">
              <h2 class="title"><?php echo $params->get('label1') ;?></h2>
                <h2 class="description"><?php echo $params->get('description1') ;?></h2>
                </div>
                <div class="content con2">
                    <img src="<?php echo $params->get('image2') ;?>" alt="">
                    <h2 class="title"><?php echo $params->get('label2') ;?></h2>
                    <h2 class="description"><?php echo $params->get('description2') ;?></h2>
                </div>
                <div class="content con3">
                    <img src="<?php echo $params->get('image3') ;?>" alt="">
                    <h2 class="title"><?php echo $params->get('label3') ;?></h2>
                    <h2 class="description"><?php echo $params->get('description3') ;?></h2>
                </div>
                <div class="content con4">
                    <img src="<?php echo $params->get('image4') ;?>" alt="">
                    <h2 class="title"><?php echo $params->get('label4') ;?></h2>
                    <h2 class="description"><?php echo $params->get('description4') ;?></h2>
                </div>
                <div class="content con5">
                    <img src="<?php echo $params->get('image5') ;?>" alt="">
                    <h2 class="title"><?php echo $params->get('label5') ;?></h2>
                    <h2 class="description"><?php echo $params->get('description5') ;?></h2>
                </div>
            </div>
        </div>
        <div class="contentnav">
            <a rel="1" href="#" class="poz1">1</a>
            <a rel="2" href="#" class="poz2">2</a>
            <a rel="3" href="#" class="poz3">3</a>
            <a rel="4" href="#" class="poz4">4</a>
            <a rel="5" href="#" class="poz5">5</a>
        </div>
    </div>
</div>




