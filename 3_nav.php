<?php /* website logo, navbar, search box */ ?>

<!-- <?php echo "<hr />This is navigation."; ?> -->

<!--
navbar consists of - 

1. website LOGO. 
2. links to FREE SAMPLE and BUY pages. 
3. link to PROFILE/LOGIN-SIGNUP page. 
4. DARK/LIGHT and TOP-BOTTOM toggle buttons. 
5. SEARCH box.

-->

<body>

	<!-- <header> </header> -->

    <nav>
        <div class="class_div_nav_item_group_1"><a href="#" id="id_div_nav_a_logo">LOGO</a></div> <!-- LOGO  -->
		<div class="class_div_nav_item_group_2"><a href="#" id="id_div_nav_a_link_1">Link 1</a>
                                                <a href="#" id="id_div_nav_a_link_2">Link 2</a>
                                                <a href="#" id="id_div_nav_a_link_3">Link 3</a></div> <!-- LINKs -->
		<div class="class_div_nav_item_group_3"><a href="#" id="id_div_nav_a_profile_info">Profile</a></div> <!-- PROFILE/LOGIN-SIGNUP  -->	<!-- need to learn sessions -->
		<div class="class_div_nav_item_group_4"> <!-- SEARCH BAR --> <input type="search" id="id_input_search" name="name_input_search" placeholder="Search" autocomplete><button type="submit" id="id_button_search" name="name_button_search">&#128269;</button></div> 
		<div class="class_div_nav_item_group_5"> <!-- TOP-BOTTOM TOGGLE --> <button type="button" id="id_button_top" name="name_button_top" onclick="window.scrollTo(document.body.scrollHeight,0);">&#x25B2</button><button type="button" id="id_button_bottom" name="name_button_bottom" onclick="window.scrollTo(0,document.body.scrollHeight);">&#x25BC</button></div>
    </nav>