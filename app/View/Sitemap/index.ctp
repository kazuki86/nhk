<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <url>
    <loc><?php echo $this->Html->url('/',true); ?></loc>
    <priority>1.0</priority>
  </url>
  <url>
    <loc><?php echo $this->Html->url('/search',true); ?></loc>
    <priority>0.8</priority>
  </url>
<?php foreach($program_url_list as $url): ?>
  <url>
    <loc><?php echo $url; ?></loc>
    <priority>0.3</priority>
  </url>
<?php endforeach; ?>
</urlset>

