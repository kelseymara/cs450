## 9/15/22
### HTML Basics
<p> Why HTML?

- need a user-friendly interface for databases 
- front-end (ex.forms for user input) </p>
<p> What is HTML?

- HTML: Hyper Text Markup Language
- How does it look like? (below) 
- What is it used for? Marking webpages </p>

``` HTML
<!DOCTYPE html>
<html>
    <head>
        <title>Webpage Title</title>
        </head>
        <body>
            <h1>Header One</h1>
            <p>Parargraph One</p>
            <p>Paragraph two</p>
        </body>
</html>
```
```HTML
THE <head> ELEMENT
    - tags: <title>, <style>

```
```HTML
THE <body> ELEMENT
Headings: 
<h#> paragraphs, h1, h2, h3... etc
<br>: line break
Font related:
<i>: italicized
<em>: emphasized
<b>: bold
<strong>: important text (could have same effect as bold)
```
```HTML
COLOR IN HTML
- can be specified by color name, RGB value, hex code
```
### HTML exercises

```HTML
<!DOCTYPE html>
<html>
    <body style= "background-color:powderblue;">
    <p>I am normal</p>
    <p style="color:red;">I am red by name</p>
    <p style="color:rgb(255,0,0)">I am red by RGB</p>
    <p style="color:rgb(0,255,0);background-color:rgb(255,0,0)">Background-color set using rgb(255,0,0).Font color set using rgb(0,255,0)</p>

    <p style="font-size:36px;">I am big</p>

    <h1 style="font-family:verdana;"> This is in verdana font</h1>
    <p style="font-family:courier;">This is in courier font</p>

    <h1 style="text-align:center;">Centered Heading</h1>

    <p style="text-align:center;">Centered paragraph</p>
    </body>
    <html>
```
```HTML
<!DOCTYPE html>
<html>
    <head>
        <title>Kelsey webpage</title>
        </head>
    <body>
        <h1>This is 1 heading</h1>
        <p>This text is in a paragraph.

        <strong>Line breaks are ignored</strong><br>
        <i>Multiple spaces     are ignored</i>
        Use &lt;br&gt; for line breaks</p>

        <h2>This is a h2 heading.</h2>
        <h3>This is h3 heading. Multiple new lines are ignored</h3>

        <h6>This is h6 heading.</h6>

        <h4>Use &lt;pre&gt; tag to show the preformated text.</h4>
        <pre>
            Twinkle, twinkle, little star
            How I wonder what you are
            </pre>
        </body>
        </html>
``


