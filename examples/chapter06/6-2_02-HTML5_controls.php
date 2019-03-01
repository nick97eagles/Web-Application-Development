<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>HTML5 Form Controls</title>
</head>

<body>
    <h1>HTML5 Form Controls</h1>
    
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <p>
            <label for="search">Search:</label>
            <input type="search" name="search" placeholder="search text" pattern="^[A-Za-z].*"/>
        </p>

        <p>
            <label for="email">Email:</label>
            <input type="email" /><br />
        </p>

        <p>
            <label for="homepage">Homepage:</label>
            <input type="url" name="homepage"/><br />
        </p>

        <p>
            <label for="telephone">Telephone:</label>
            <input type="tel" name="telephone"/><br />
        </p>

        <p>
            <label for="age">Age:</label>
            <input type="number" name="age" min="18" max="120" step="0.5"/><br />
        </p>

        <p>
            <label for="skill">Programming Skill:</label>
            <input type="range" name="skill" min="0" max="10" /><br />
        </p>

        <p>
            <label for="bdate">Birthdate:</label>
            <input type="date" name="bdate" max="<?= date("Y-m-d") ?>"/><br />
        </p>

        <p>
            <label for="month">Graduation Month:</label>
            <input type="month" name="month"/><br />
        </p>

        <p>
            <label for="week">Vacation Week:</label>
            <input type="week" name="week"/><br />
        </p>

        <p>
            <label for="btime">Bedtime:</label>
            <input type="time" name="btime"/><br />
        </p>

        <p>
            <label for="ptime">Party Time:</label>
            <input type="datetime-local" name="ptime"/><br />
        </p>

        <p>
            <label for="fcolor">Favorite Color:</label>
            <input type="color" name="fcolor"/><br />
        </p>

        <p>
            <input type="reset" value="Reset Form" /><br />
            <input type="submit" value="Submit Form" /><br />
        </p>
    </form>
    
    <pre>
    <?php print_r($_REQUEST) ?>
    </pre>

    <p>
        <a href="https://validator.w3.org/check/referer">validate HTML</a>
        | <a href="https://jigsaw.w3.org/css-validator/check/referer">validate CSS</a>
    </p>
</body>

</html>
