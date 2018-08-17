# Favicons chunk 
Generating favicons can be a pain, and using the online generators can sometimes be annoying. Using PHPThumbOf, a MODX Extra, we can create favicons on the fly.

#### Notes 
You'll need to have PHPThumbOf Installed for this to work [https://docs.modx.com/extras/revo/phpthumbof](https://docs.modx.com/extras/revo/phpthumbof).


```HTML
[[$favicons? &src=`/path/to/favicon.png` &color=`#HEX`]]
```

## Usage 
- src: a path to your logo, favicon or emblem 
- color: a HEX color for MS tiles including the HASH #