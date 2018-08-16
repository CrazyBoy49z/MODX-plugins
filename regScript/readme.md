# RegScript
Ever needed to add in CSS or Javascript in a single MODX resources but in doing so you either have to write a conditional statement in your template files or include it directly in the resoruce and risk it being called to earlier? Well, since MODX is great and gives us these methods: 

```PHP
// Before </head>
$modx->regClientCSS('');
$modx->regClientStartupScript('');
$modx->regClientStartupHTMLBlock('');

// Before </body>
modx->regClientScript('');
$modx->regClientHTMLBlock('');
```

This simple snippet takes your stylesheet path, inline style block, script path, script block or even generic HTML and loads it in the correct place.

## Usage 

```HTML
[[regScript? 
    &src=`path/to/script.js` 
    &href=`path/to/style.css`
    &code=`
        function myFunction(p1, p2) {
            return p1 * p2; // The function returns the product of p1 and p2
        }`
    &style=`
        .foo {
            font-size:10px;
            height:200px;
            padding:8px;
        }`
    &html=`
        <div class="modal">Hi, I'm a modal box</div>
    `
    &toHead=`false`
]]
```

A bit of an explanation, you have 6 options, somethings are taken as granted for you:

- **src:** will auto place scrits before `</body>` unless `toHead` is true
- **code:** will auto place `<script></script>` before `</body>` unless `toHead` is true 
- **href:** will auto place stylesheets in `<head></head>` unless `toHead` is specficially set to false
- **style:** will auto place `<style></style>` blocks in the `<head></head>` unless `toHead` is specficially set to false
- **HTML:** will auto place HTML block before `</body>` unless `toHead` is true

## Install 
1. Create a snippet in your MODX elements tab, you can call it whatever you want! The name can change but the methods stay the same.
2. Paste the PHP code from `regScript.snippet.php` into your newly created snippet
3. Save the file
4. Use the snippet in your resource e.g. `
```HTML
[[snippetName? &src=`path/to/script.js`]]
```

### Notes
In the examples above we call this script cached as it'll speed up the delivery of the resource. In development, we recommend calling it uncached i.e. `[[!regScript]]` so if anything goes wrong you can fix it without invalidating your whole site cache. 

And that's all there is to say about that.