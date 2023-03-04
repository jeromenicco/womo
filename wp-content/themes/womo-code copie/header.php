<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Womo">
    <meta name="author" content="Jerome Nicco">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc1OgOLHoXB_YV3wR2mQ_sdEcxZko4qsE&map_ids=f44ef9f6d077069d&callback=initMap" defer>
    </script>


    <title><?php echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    $parent_page = get_page_by_path('solutions/');
    $args = array(
        'post_type'      => 'page',
        'post_parent'    => $parent_page->ID,
    );
    $children_solutions_query = new WP_Query($args);
    ?>

    <header>
        <div class="nav-space"></div>
        <nav id="navbar" class="nav-container white">
            <a class="logo-container" href="<?php echo get_home_url(); ?>">
                <!-- <div class="content"> -->
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/logo/womo-logo.svg" alt="logo" /> -->

                <!-- <div class="logo-layer2">
                        <div ></div>
                    </div> -->
                <h1>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 239.39 20.97" style="enable-background:new 0 0 239.39 20.97;" xml:space="preserve">
                        <g id="Layer_1">
                            <g>
                                <path class="st0" d="M22.6,0.89h5.18L22.9,20.03h-5.32l-3.4-11.61l-3.4,11.61H5.35L0.47,0.89h5.34l2.62,11.47l3.37-11.47h4.86
                                    l3.38,11.34L22.6,0.89z" />
                                <path class="st0" d="M39.35,0.48c5.26,0,9.83,3.78,9.83,9.99c0,6.21-4.56,9.99-9.83,9.99s-9.83-3.78-9.83-9.99
                                    C29.52,4.26,34.08,0.48,39.35,0.48z M39.35,15.57c2.24,0,4.62-1.59,4.62-5.13c0-3.48-2.38-5.07-4.62-5.07s-4.62,1.59-4.62,5.07
                                    C34.73,13.98,37.11,15.57,39.35,15.57z" />
                                <path class="st0" d="M61.7,0.48c5.26,0,9.83,3.78,9.83,9.99c0,6.21-4.56,9.99-9.83,9.99c-5.26,0-9.83-3.78-9.83-9.99
                                    C51.88,4.26,56.44,0.48,61.7,0.48z M61.7,15.57c2.24,0,4.62-1.59,4.62-5.13c0-3.48-2.38-5.07-4.62-5.07
                                    c-2.24,0-4.62,1.59-4.62,5.07C57.09,13.98,59.46,15.57,61.7,15.57z" />
                                <path class="st0" d="M86.92,20.03L80.28,8.66v11.36h-4.99V0.89h5.83l5.97,10.39V0.89h5.02v19.14H86.92z" />
                                <path class="st0" d="M100.51,20.03h-5.18l4.89-19.14h5.32l3.4,11.61l3.4-11.61h5.43l4.89,19.14h-5.34l-2.62-11.47l-3.37,11.47
                                    h-4.86l-3.38-11.34L100.51,20.03z" />
                                <path class="st0" d="M133.63,0.48c5.26,0,9.83,3.78,9.83,9.99c0,6.21-4.56,9.99-9.83,9.99c-5.26,0-9.83-3.78-9.83-9.99
                                    C123.8,4.26,128.37,0.48,133.63,0.48z M133.63,15.57c2.24,0,4.62-1.59,4.62-5.13c0-3.48-2.38-5.07-4.62-5.07
                                    c-2.24,0-4.62,1.59-4.62,5.07C129.01,13.98,131.39,15.57,133.63,15.57z" />
                                <path class="st0" d="M147.21,20.03V0.89h6.94c5.56,0,9.61,3.64,9.61,9.58c0,5.94-4.05,9.56-9.64,9.56H147.21z M154.1,15.09
                                    c2.4,0,4.48-1.4,4.48-4.64s-2.08-4.7-4.48-4.7h-1.83v9.34H154.1z" />
                                <path class="st0" d="M167.35,13.01V0.89h5.05v11.96c0,1.89,0.97,2.89,2.64,2.89c1.67,0,2.62-1,2.62-2.89V0.89h5.05v12.12
                                    c0,4.8-3.21,7.45-7.67,7.45C170.59,20.46,167.35,17.81,167.35,13.01z" />
                                <path class="st0" d="M187.33,20.03V0.89h5.02v14.36h7.29v4.78H187.33z" />
                                <path class="st0" d="M202.86,20.03V0.89h12.25v4.37h-7.23v3.02h6.59v4.21h-6.59v3.08h7.29v4.45H202.86z" />
                            </g>
                        </g>
                        <g id="Layer_2">
                            <rect x="219.79" y="0.89" class="st1" width="19.14" height="19.14" />
                        </g>
                    </svg>
                </h1>
            </a>
            <div class="content">
                <ul class="desktop-menu-links">
                    <li class="dropdown header">
                        <span class="dropbtn"><?php pll_e('Oplossingen'); ?></span>
                        <div class="dropdown-content">
                            <?php wp_nav_menu(array('menu' => 'secondary')); ?>
                        </div>
                    </li>
                    <?php wp_nav_menu(array('menu' => 'main')); ?>
                </ul>
            </div>


            <div class="content desktop-contact-link">
                <a href="<?php the_permalink(); ?>/contact">
                    <h6><?php pll_e('Neem contact op'); ?></h6>
                </a>
            </div>

            <div class="burger content">
                <div class="line1"></div>
                <div class="line2"></div>
            </div>
            <div class="dropdown-menu closed">
                <!-- <div class="content">
                    <div class="wrapper">
                        <ul>
                            <li class="coded-nav-item"><?php pll_e('Oplossingen'); ?></li>

                            <?php wp_nav_menu(array('menu' => 'primary')); ?>

                            <a href="<?php the_permalink(); ?>/contact">
                                <h6><?php pll_e('Neem contact op'); ?></h6>
                            </a>
                        </ul>
                    </div>
                    <?php wp_nav_menu(array('menu' => 'secondary')); ?>
                </div> -->
                <div class="content">
                    <ul class="list-wrapper">
                        <li class="coded-nav-item"><?php pll_e('Oplossingen'); ?></li>

                        <?php wp_nav_menu(array('menu' => 'secondary')); ?>

                        <div>
                            <?php wp_nav_menu(array('menu' => 'primary')); ?>

                            <a href="<?php the_permalink(); ?>/contact">
                                <h6><?php pll_e('Neem contact op'); ?></h6>
                            </a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <script defer>
        const body = document.body
        const navBar = document.querySelector('#navbar')
        let lastScroll = 0

        window.addEventListener("scroll", () => {
            const currentScroll = window.pageYOffset
            if (currentScroll <= 0) {
                body.classList.remove('scroll-down')
                body.classList.remove('scroll-up')
                return
            }
            if (currentScroll > 40) {
                if (currentScroll > lastScroll && !body.classList.contains('scroll-down')) {
                    body.classList.add('scroll-down')
                } else if (currentScroll < lastScroll && body.classList.contains('scroll-down')) {
                    // body.classList.remove('scroll-down')
                }
            }
            lastScroll = currentScroll
        })


        const burger = document.querySelector('.burger')
        const dropdown = document.querySelector('.dropdown-menu')
        burger.addEventListener('click', () => {
            burger.classList.toggle('open')

            dropdown.classList.toggle('closed')
        })

        // const navItem = document.querySelector('.solutions-menu-btn')
        // const subMenu = document.querySelector('.dropdown-solutions')

        // const handleSubMenu = () => {
        //     navItem.addEventListener('mouseenter', () => {
        //         subMenu.classList.remove('closed')
        //     })

        //     subMenu.addEventListener('mouseleave', () => {
        //         subMenu.classList.add('closed')

        //     })
        // }

        // handleSubMenu()
    </script>