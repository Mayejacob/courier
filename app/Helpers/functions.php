<?php
 
 function adminAsset($assetLink)
 {
     return asset('admin/'.$assetLink);
 }
 function isActive($url)
 {
    return Request::is($url) ? 'active' : '';
 }
 function isMenuOpen($url)
 {
    return Request::is($url) ? 'menu-open' : '';
 }