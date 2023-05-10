<?php
include 'header.php';

GenerateHeader('Landing Page');

GenerateNavigationElement();
?>
<div class="body-container">
  <div class="image-banner">
    <div class="banner-text">Welcome To Cars.com</div>
  </div>
  <div class="info-container">
    <h3>About:</h3>
    <p>A website to seach vehicle information such as manufacturer, price and body style.</p>
    <h3>Get Started:</h3>
    <p>1. Choose Subscription Plan <br> 2. Create Account <br> 3. Car</p>
  </div>
  <div class="payment-plans">
    <a class="subscription-option">
      <div class="sub-header">Free</div>
      <div class="sub-body" style="background-color: #00CC99">
        <h1>$0 /mo</h1>
        <ul>
          <li>All Car Data</li>
          <li>Limited Features</li>
          <li>Targeted Ads</li>
        </ul>
        <div class="sub-footer">Create Free Account</div>
      </div>
    </a>
    <a id="proplan" href="https://venmo.com/u/Cole-Belfry" class="subscription-option">
      <div class="sub-header">Pro</div>
      <div class="sub-body" style="background-color: #F06449">
        <h1>$5 /mo</h1>
        <ul>
          <li>All Car Data</li>
          <li>limited Features</li>
          <li>No Ads</li>
        </ul>
        <div class="sub-footer">Buy Now</div>
      </div>
    </a>
    <a id="premplan" href="https://venmo.com/u/Cole-Belfry" class="subscription-option" >
      <div class="sub-header">Premium</div>
      <div class="sub-body" style="background-color: #DD1155">
        <h1>$10 /mo</h1>
        <ul>
          <li>all car data</li>
          <li>Italian DLC Pack</li>
          <li>Gold Edition</li>
        </ul>
        <div class="sub-footer">Buy Now</div>
      </div>
    </a>
  </div>
</div>