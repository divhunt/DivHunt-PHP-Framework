block::setPath('blog_templates', '/packages/templates/blog');

// Use saved path
include block::name('blog-item', 'blog_templates')->load();

// Or direct path can be set
include block::name('packages/templates/blog/blog-item')->load();