define({ "api": [
  {
    "type": "post",
    "url": "/phone/item/update",
    "title": "Update Item",
    "name": "Update",
    "group": "Item",
    "version": "1.0.2",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>item ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>name (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>description (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "price",
            "description": "<p>price (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "productLink",
            "description": "<p>productLink (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "returnPolicy",
            "description": "<p>return Policy (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "count",
            "description": "<p>count (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "likes",
            "description": "<p>likes (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sku",
            "description": "<p>sku (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "shippingCost",
            "description": "<p>shipping Cost (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "category",
            "description": "<p>category ID (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "zip",
            "description": "<p>ZIP code (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": false,
            "field": "isOffered",
            "description": "<p>Offer ability (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lowPrice",
            "description": "<p>Low price for offer (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "imageFiles",
            "description": "<ul> <li>array of files (optional).</li> </ul>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "images",
            "description": "<p>[{&quot;id&quot; : &quot;123123&quot;, &quot;order&quot; : 1}] Images for update (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "videos",
            "description": "<p>[{&quot;id&quot; : &quot;123123&quot;, &quot;order&quot; : 1}] videos for update (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "address",
            "description": "<p>Object {&quot;first&quot;:&quot;first&quot;, &quot;last&quot;:&quot;last&quot;(optional), &quot;street&quot;:&quot;street&quot;, &quot;state&quot;:&quot;state&quot;, &quot;city&quot;:&quot;city&quot;, &quot;zip&quot;:&quot;zip&quot;, &quot;street2&quot;:&quot;street2&quot;, &quot;phone&quot;:&quot;phone&quot;} for address (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "box",
            "description": "<p>{&quot;weight_units&quot;: &quot;LB&quot;,&quot;height&quot;: 12,&quot;width&quot;: 10,&quot;length&quot;: 8,&quot;size_units&quot;: &quot;IN&quot;,&quot;name&quot;:&quot;custom&quot;}, Standard box id (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "carriers",
            "description": "<p>Array of Carrier ID (optional).</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "typeDetails",
            "description": "<p>array of typeDetails Ids. (optional)</p>"
          }
        ]
      }
    },
    "filename": "src/AppBundle/Controller/TodoController.php",
    "groupTitle": "Item"
  }
] });
