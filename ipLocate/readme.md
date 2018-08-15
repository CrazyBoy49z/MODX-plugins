# IP Locate 

Use geoplugin.net to return GEO location info based on the users IP Address. This snippet was originally created to change telephone number based on the users location. Unlike most snippets this should be called cached as the users location is unlikely to change all that often. 

## Usage 

```HTML
    // Defaults 
    [[ipLocate?
        &locate=`countryName`
        &debug=`false`
        &toPlace=`false`
    ]]
```

## Options 

The request returns an array with the information below, you can return a specific field by defining it in the &locate=`` paramater. The default is countryName
- request
- status
- delay
- credit
- city
- region
- regionCode
- regionName
- areaCode
- dmaCode
- countryCode
- countryName
- inEU
- euVATrate
- continentCode
- continentName
- latitude
- longitude
- locationAccuracyRadius
- timezone
- currencyCode
- currencySymbol
- currencySymbol_UTF8
- currencyConverter

#### toPlace 

You can set the returned data to a placeholder so it can be quired/ used elsewhere on your page. The place holder name is the name of the locate parameter i.e.

```HTML 
    // Placeholder name is same as &locate=`` param
    [[+countryName]]

    // You can query the placeholder using output modifier 
    [[+countryName:is=`Spain`:then=`Hola`:else=`Hello`]]
```