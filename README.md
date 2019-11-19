# CMSik

CMSik is a simple CMS system. It lets you manage your content using simple textfiles, without using any kind of database - it works on every PHP server and is hack-proof because of its simple DB-less nature.

## Status

CMSik now has the following features:
* CMSik can fetch your articles from a list stored in the articles.txt file ~~and see who's naughty or nice!~~ no it can't do the last part
* CMSik can fetch article data, including title, text, and an infinite number of photos for the aspiring ones who want to make a photography blog.
* CMSik can be translated and customized to your needs, providing you know the very basics of front-end development (HTML/CSS/JS)
* CMSik-displayed articles can be optionally commented by your visitors. You can moderate your comment section by opening the article's comment file directly and removing the comments you don't want. The comments are sanitized as to not break the HTML template of your site.

CMSik will have following features soon:
* Additional features that all alternative emo teens crave for their blogs.
* Top bar static pages/article redirects
* A more serious README.md

#### See the status details on the projects page.
### New to "Projects" naming in this repo?

* Project EMO - features for blogs (not necessarily alternative emo teen ones)
* Project CASH - website creation/business features
* Project BUG - bugs to deal with (generated automatically from issues)

## Download and Installation

To begin using CMSik, do this:
* Grab CMSik files: [Grab CMSik](https://github.com/adrian09011/cmsik)
* Paste them into a folder of your choice
* Start hacking on your new blog/site/whatever. Some assembly (not the programming language kind, fortunately) required. And by that, I mean some basic HTML/CSS/JS knowledge, you know, modifying the template, adding the elements you want. It's built on Bootstrap so if you know that, here's a cookie for you 🍪
* Delete the template articles, write some masterpieces (hint: you can format your text using regular HTML tags!), save them as UTF-8 encoded textfiles and edit the list file (save it as ANSI encoded textfile)
* Have fun with your site/blog/whatever

## Article Creation Tutorial

**This is a sample article.**

Lorem ipsum

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur a odio velit. Sed congue maximus libero in tempor. Morbi lacus nibh, sollicitudin et nibh non, vehicula pretium urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed bibendum dapibus magna vel laoreet. Cras ullamcorper, ligula ac sodales tincidunt, dolor eros volutpat orci, non rhoncus odio urna nec nibh. Nam mi nulla, gravida quis rhoncus vitae, fringilla non ante. Nullam feugiat nulla nec est eleifend, vitae venenatis diam feugiat. Integer vehicula, tortor ac sagittis dictum, neque dolor sagittis felis, sed lobortis turpis odio placerat ante. In malesuada, neque eu accumsan rutrum, risus massa pellentesque nibh, ut ultrices diam felis id magna. Donec tortor velit, mollis ut lorem viverra, lacinia gravida turpis. Nam placerat metus erat, nec ultrices libero accumsan sit amet.

1

examples/images/zdjecie1-1.jpg

examples/images/zdjecie1-2.jpg


* First line - article title
* Second line - article content. Separate newlines with <br>
* Third line - 0 to disable comments, 1 to enable comments.
* Next lines till the end - photos, you can add an infinite number of photos to your article.

## Bugs and Issues

Have a bug or an issue with this CMS? It should be bugless, if it's not then open an issue and I might take care of it someday when I'm not busy with other stuff. Unlike other people, that means it actually will be done and is not just an empty promise, though.

## About

CMSik is made by me and was made as a school project.

## Copyright and License

Made with love (❤) 2019 adrian09011. Code released under the MIT license.
