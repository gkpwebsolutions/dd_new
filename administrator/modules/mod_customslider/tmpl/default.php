<?php
defined('_JEXEC') or die;
?>

<div id="custom-slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        // Loop through the slider items and display them
        $active = true;
        foreach ($sliderItems as $item) :
        ?>
            <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                <!-- Debug the image path -->
                <p>Image Path: <?php echo JUri::base() . $item->image_path; ?></p> <!-- Debugging line -->
                <img src="<?php echo JUri::base() . $item->image_path; ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($item->name); ?>">
                <?php if ($item->name) : ?>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo htmlspecialchars($item->name); ?></h5>
                    </div>
                <?php endif; ?>
            </div>
        <?php
            // Set the first item as active
            $active = false;
        endforeach;
        ?>
    </div>
    <a class="carousel-control-prev" href="#custom-slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#custom-slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<!-- Include Bootstrap and jQuery for the carousel functionality (if not already loaded) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
