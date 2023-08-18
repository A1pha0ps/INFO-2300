# Project 2: Design Journey

**For each milestone, complete only the sections that are labeled with that milestone.** Refine all sections before the final submission. If you later need to update your plan, **do not delete the original plan, leave it place and append your new plan below the original.** Explain why you are changing your plan. Remember you are graded on your design process. Updating the plan documents your process!

**Replace ALL _TODOs_ with your work.** (There should be no TODOs in the final submission.)

Be clear and concise in your writing. Bullets points are encouraged.

**Everything, including images, must be visible in Markdown Preview.** If it's not visible in Markdown Preview, then we won't grade it. We won't give you partial credit either. **Your design journey should be easy to read for the grader; in Markdown Preview the question and answer should have a blank line between them.**


## Design / Plan (Milestone 1)

**Make the case for your decisions using concepts from class, as well as other design principles, theories, examples, and cases from outside of class (includes the design prerequisite for this course).**

You can use bullet points and lists, or full paragraphs, or a combo, whichever is appropriate. The writing should be solid draft quality.


### Audience (Milestone 1)
> Who is your site's audience? (Yes, this is members of the playful plants project.)
> Briefly explain who the intended audience is for your project website.

Members of the playful plants project. They are planners, designers, etc. and will utilize the database for their needs, which is fast and efficient lookup for specific fields.


### Audience Goals (Milestone 1)
> Document your site's audience's goals.
> List each goal below. There is no specific number of goals required for this, but you need enough to do the job.

Audience goals: -Have a website with data that filters efficiently (not all the fields)
                -Database must contain ideas for play
                -A way to share the resources


### Persona (Milestone 1)
> Use the goals you identified above to develop a persona of your site's audience.
> Your persona must have a name and a "depiction". This can be a photo of a face or a drawing, etc.
> There is no required format for the persona.
> You may type out the persona below with bullet points or include an image of the persona. Just make sure it's easy to read the persona when previewing markdown.

![PersonaAndAudienceGoals](/design-plan/Design%201.png)


### Audience Data (Milestone 1)
> Using your persona, identify the data you need to include in the catalog for your site's audience.
> List the data the audience needs for each plant. (i.e. plant name, etc.)
>
> Hint: You should not include all the data provided. Be selective. Only include the data that advances the audience's goals.

-Id (indexing/primary Key)
-Plant name
-Plant Genus Name
-Plat ID
-Play Type Categorization
  -Supports Exploratory Constructive Play
  -Supports Exploratory Sensory Play
  -Supports Physical Play
  -Supports Imaginative Play
  -Supports Restorative Play
  -Supports Expressive Play
  -Supports Play with Rules
  -Supports Bio Play
-Types of Activites Plant Supports
  -Nooks/Secret Spaces
  -Provides Loose Parts/Play Spaces
  -Climbing & Swinging
  -Etc.

### Design Pattern Exploration (Milestone 1)
> Find three (3) example catalog websites (without images).
> For each example, identify elements of the catalog's design that are common among text based catalogs.
> Hint: How is the data presented? How is the data filtered or sorted?

Example Catalog 1: [Cornell Library Website](https://newcatalog.library.cornell.edu/?q=web+design)

-Boxes sections to create grouping and puts common ideas together (such as filtering)
-Has filtering
-Has ease of access button to go to multiple pages of the database
-Contains clear dividers between different data (in this case plants)
-Arranges subdata in a consistent and pleasant way with enough spacing (i.e. plant group/type, variety, states, etc.)

Example Catalog 2: [Seed Savers Exchange, Seed Exchange](https://exchange.seedsavers.org/page/catalog/search/variety?plant-type=PEPPER&avail=)

-Boxes sections to create grouping and puts common ideas together (such as filtering)
-Has filtering AND sorting
-Contains clear dividers between different data (in this case books)
-Arranges subdata in a consistent and pleasant way with enough spacing (i.e. author, type of accesibility, other languages)

Example Catalog 3: [Northeast Regional Climate Center, Normal Daily Mean Temperatures](http://www.nrcc.cornell.edu/wxstation/comparative/comparative.html#)

-Has filtering (search bar) AND sorting (ascending/descending)
-Contains clear dividers between different data (in this case cities) using color contrast of background that alternates
-Compresses data in an efficient manner yet gives enough spacing to make the design visually attractive (attractive in the sense its formal/targeted for an audience that
doesn't focus on the looks moreso ease of access of data)

### Site Design (Milestone 1)
> Document your _entire_ design process. **We want to see iteration!**
> **Show us the evolution of your design from your first idea (sketch) to the final design you plan to implement (sketch).**
> Show us the process you used to organize content and plan the navigation, _if applicable_ (card sorting).
> Plan your URLs for the site. (Yes, it's possible for this assignment, you only have one.)
> Provide a brief explanation _underneath_ each design artifact. Explain what the artifact is, how it meets the goals of your personas (**refer to your personas by name**).
> Clearly label the final design.
>
> **Important!** Plan _all_ site requirements. This includes the "add entry" form.

_Initial Designs/Ideas:_

![Initial Design](/design-plan/Initial%20Design%20Website.png)

-Contains the initial design that plans out the entire site. Stan will see the main page will be the database. Then, Stan with the other URL will access the link to a form for adding new plants. The main page will also contain filtering so Stan can view his key traits easier.

_Final Design:_

(Update: 3/14/2022) Modify the table to have headers. Left column: Plant Info; Right Column: Plant Properties.
                    Modify the table to fix overflow issue with the labels (make the span tags "inline-block" vs "inline")

                    ![3/14/2022 Updated Design (MileStone 2 Progress)](/design-plan/changed.png)

![404 Page Design](/design-plan/404%20P2.png)

-Contains image of the outline sketch for the 404 page.


### Design Patterns (Milestone 1)
> Write a one paragraph reflection explaining how you used design patterns for online catalogs in your site's design.

Website uses appropiate spacing to make it more appealing for Stan and other members of the Playful Plants team. It also groups common elements togther such as the types of plants and activity types. I also designed the website to make sure that all elements (database, filtering/sorting, adding) were on one page to make it as easy as possible to obtain information and add new information. The database has been created in a way that utilizes generous spacing between elements and other entries to clearly distinguish seperate information and plants. For example, plants are grouped together by alternating the background color of the table entries (one darker, one lighter). Information about the plant vs the types of play/activites is seperated based on grouping of text.



## Implementation Plan (Milestone 1, Milestone 2, Final Submission)

-First Create the page and style it to the design images
-Preplan the Forms
-Implement the Forms and their sticky/responsiveness using PHP
-Preplan the Insert and Filtering/Sorting querying
-Implement the Insert and Filter/Sorting with its PHP
-Finalize the design
-Implement the `@media print{...}`

**Provide enough detail in your plan that another 2300 student could implement your plan.**

### Database Schema (Milestone 1)
> Describe the structure of your database. You may use words or a picture. A bulleted list is probably the simplest way to do this. Make sure you include constraints for each field.

TABLE: Plants

ID: Integer (PK, U, NN, AI)
Plant Name: TEXT (U, NN)
Plant Genus: TEXT (U,NN)
Plant ID: TEXT (U, NN)
Exploratory Constructive Play: INTEGER (NN)
Exploratory Sensory Play: INTEGER (NN)
...
(For all Plant Play Types)

Nooks/Secret Spaces: INTEGER (NN)
...
(For all Plant Activites)

(Integer = 1 (True), 0 (False))

### Database Query Plan (Milestone 2, Final Submission)
> Plan your database queries. You may use natural language, pseudocode, or SQL.

1. All Records (Milestone 2)

    ```
    SELECT * FROM grades;
    ```

2. Filter/Sort Records (Final Submission)


    General Filter/Sort Query:

    ```
    SELECT * FROM plants WHERE (playType1 = 1) OR (playType2 = 1) OR ... OR (playTypeN = 1) ORDER BY plant_name ASC/DESC
    ```

    Security SQL:

    ```
    SELECT * FROM plants WHERE (playType1 = :var1) OR (playType2 = :var2) OR ... OR (playTypeN = :varN) ORDER BY plant_name ASC/DESC
    array(':var1' => $playType1, ..., ':varN' => $playTypeN)
    ```

3. Insert Record (Final Submission)

    Security SQL:

    ```
    INSERT INTO plants (plant_name, plant_genus, plant_id, playType1, playType2, ..., playTypeN) values (:plant_name, :plant_id, ..., :playTypeN)
    array(':plant_name' => $plant_name, ':plant_id' => $plant_ID, ..., etc.)
    ```


### Code Planning (Milestone 2, Final Submission)
> Plan any PHP code you'll need here using pseudocode.
> Use this space to plan out your form validation and assembling the SQL queries, etc.

PHP Database Query (Milestone 2)

```
  -Initialize the database and query it using PDO
  -Combine the PHP into the table
    -Use conditional statements + Hidden Css Class for the labels
```

PHP Form Validation (Milestone 2)

```
  -Initialize variables needed for sticky-form processing
  -Initialize variables for responsive feedback
  -Use conditional statements to check what has been inputted / hasn't
    -Based on this, if a field hasn't been filled out, notify the user (Stan)
    -If it has, use sticky variables to keep track of fields
  -Implement a valid form submission response!
```

PHP Filtering/Sorting
```
  -3 Parts:
    -SELECT Statement
    -WHERE Statement
    -OrderBy Statement

  -For WHERE Statement, use an array and implode to format the inputs into SQL Syntax.
  -Initialize those 3 parts, then concatenate them together.
  -Run the SQL-injection SAFE query.
```

PHP Insert

```
  -Exec_SQL_Query(run the SQL injection SAFE insert statement here)
```


### Accessibility Audit (Final Submission)
> Tell us what issues you discovered during your accessibility audit.
> What do you do to improve the accessibility of your site?

There were no accessibility errors in the audit of the final milestone/submission. I had fixed most of them initially, which were mislabeled ARIA labels and improper spacing of table elements. I also increased the font per table row to make it easier to read for the users.



## Reflection (Final Submission)

### Audience (Final Submission)
> Tell us how your final site meets the goals of the site's audience. Be specific here. Tell us how you tailored your design, content, etc. to make your website usable for your persona. Refer to the persona by name.

Stan, a member of the Playful Plants Project Committee, can use the website to meet its goals. The first goal of the playful plants project is "To develop a (searchable) database of playful plants that can support a range of nature play experiences." I did this by implementing an SQL Database that filters and sorts on the two most important fields (in my opinion) that can help distinguish it from other plants: play type and activity support type. The next goal Stan would have is "To provide ideas & plant collections for themed nature play spaces & gardens." I did this indirectly by having a filter for activity support type, which can help users (and Stan) sort plants by, for example, if they can use the plants for secret spaces or for loose parts. Lastly, the final goal Stan had was "To develop a web resource for sharing these resources, including the ability to tailor selections and print plant lists." This goal was implmented using the CSS print media, which formatted the webpage to be printable such that it ONLY contains the most crucial content on the page (aka the database). It also restyles the page a bit to make it fit better on the printable layout (A4 paper).


### Additional Design Justifications (Final Submission)
> If you feel like you haven’t fully explained your design choices in the final submission, or you want to explain some functions in your site (e.g., if you feel like you make a special design choice which might not meet the final requirement), you can use the additional design justifications to justify your design choices. Remember, this is place for you to justify your design choices which you haven’t covered in the design journey. You don’t need to fill out this section if you think all design choices have been well explained in the design journey.

NONE


### Self-Reflection (Final Submission)
> Reflect on what you learned during this assignment. How have you improved from Project 1? What would you do differently next time?

I learned from this assignment how to implement SQL databases into a website. Specifically, I learned how to add new entries into a table and filter/sort existing entries. I learned a lot more about the SQL Syntax such as WHERE, ORDERBY, etc. I think that I've improved from project 1 in that my design skills have become better overall. I spent less time on the design styling as I think that my prior experience in project 1 saved a lot of time. I knew immediately how to style it to display the page in a way that I wanted. If I could do something differently next time, I would try to change the styling of the forms as I am not too entirely sure on how to do that. Maybe, if I could, I would use Javascript to add even more functionality.


> Take some time here to reflect on how much you've learned since you started this class. It's often easy to ignore our own progress. Take a moment and think about your accomplishments in this class. Hopefully you'll recognize that you've accomplished a lot and that you should be very proud of those accomplishments!

I have learned how to implement PHP and SQL querys efficiently. I have also learned about protecting my SQL Databases from injections. Finally, my overall experience with CSS and HTML have increased, and I can say I am more confident now in creating designs. With this higher experience, I can spend less time trying to format my HTML/CSS styling and focus more on my PHP.
