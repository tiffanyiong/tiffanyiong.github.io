<?php 
class WDWT_licensing_page_class{
  
  function view_licensing(){ ?>

    <div id="main_licensing_page" class='no_option_content'>
      <p><span style="font-weight:bold;">In the FREE version of the theme, theme options can be changed only through the <i>customizer</i>.</span><br/><br/>
        <?php echo __( 'This theme is the non-commercial version of the Sauron theme. You will be able to use it free of charge. It comes with a large number of features. Some of the advanced features are not available for this option. If you want to use those features, you are required to purchase a license.', WDWT_LANG ); ?></p>
        <table class="data-bordered" style="width:543px;color: #555;text-align:center;margin: 0px auto;">
        <thead>
          <tr> 
            <th scope="col" class="top first" nowrap="nowrap">Features of the Theme</th>
            <th scope="col" class="top notranslate" nowrap="nowrap">Free</th>
            <th scope="col" class="top notranslate" nowrap="nowrap">Pro Version</th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <td>WordPress 3.9+ ready +</td>
            <td class="icon-replace yes">yes</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="alt">
            <td>SEO-friendly</td>
            <td class="icon-replace yes">yes</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="">
            <td>Custom favicon and logo</td>
            <td class="icon-replace yes">yes</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="alt">
            <td>Possibility to add custom CSS</td>
            <td class="icon-replace yes">yes</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="">
            <td>Featured animated slider</td>
            <td class="icon-replace yes">yes</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="alt">
            <td>30 pre-installed fonts</td>
            <td class="icon-replace yes">yes</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="">
            <td>Widgets for AdSense and Advertisements</td>
            <td class="icon-replace yes">yes</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="alt">
            <td>Child theme support</td>
            <td class="icon-replace yes">yes</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="">
            <td>6 built in customizable layouts</td>
            <td class="icon-replace yes">yes</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="alt">
            <td>Social links</td>
            <td class="icon-replace yes">yes</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="">
            <td>Possibility to add custom codes</td>
            <td class="icon-replace no">no</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="alt">
            <td>Advertisements and AdSense</td>
            <td class="icon-replace no">no</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="">
            <td>Full SEO management</td>
            <td class="icon-replace no">no</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="alt">
            <td>4 pre-installed color schemes and color customization possibility.</td>
            <td class="icon-replace no">no</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="">
            <td>9 different page templates</td>
            <td class="icon-replace no">no</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="alt">
            <td>15 transition effects for lightbox</td>
            <td class="icon-replace no">no</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="">
            <td>Front page contact form and diagrams</td>
            <td class="icon-replace no">no</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="alt">
            <td>Admin settings control screen.</td>
            <td class="icon-replace no">no</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="">
            <td>Support upon request in 24 hours</td>
            <td class="icon-replace no">no</td>
            <td class="icon-replace yes">yes</td>
          </tr>
          <tr class="alt">
            <td>Buy using PayPal or Credit Card</td>
            <td class="price" style="text-align:center; color:#FF7721; text-shadow: 1px 1px #aaa; font-size:20px;">Free</td>
            <td>
              <div class="buy_theme" style="float:left;">
                <a href="<?php echo WDWT_HOMEPAGE; ?>/wordpress-themes/<?php echo WDWT_SLUG; ?>.html" target="_blank">
                  <div></div>
                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  <?php
  }
  
  
}
?>