# Athena : Article Repository Management System

[![Athena Badge](https://img.shields.io/badge/Project-Article%20Repository%20Management%20System-orange?style=for-the-badge&logo=github)](https://github.com/hariketsheth/Article_Repository_Management_System)

>### About the Project 
> In this Tech Savvy era, with lot of advancements in the field of AI, ML, IoT and Deep Learning - People are randomly posting out random, partial and incomplete data on internet. 
> ARMS proposes a Reviewed Article System in which article is published only after review. With added features for visually impaired, ARMS is ready to be implemented
>
> The features include:
> 1. **Automated System** - A Fully Automated Content Posting System
> 2. **Options and Panel** - User Dashboard and Admin Panel
> 3. **Fully Flexible Editor** - 83+ Formatting Options
> 4. **Post Status** - Functionality to save your contributions as Drafts, Send for Reviews and Get is Published by Admin
> 5. **Newsletter** - Newsletter Section for getting updates about new posts
> 6. **AthenaVoice** - A section for The People with Vision defects / complete blindness - so that they can listen to the article content.
> 7. **Social Media Sharing** - Direct Social Media sharing options, to avoid hassle of Link copying and storing
> 8. **Author Profiles** - Easily Sharabale profiles for a particular author, which could be shared to present your contributed works. (Without any company branding)
> 9. **Comments** - Innovative Comment System that adds a tag based on the type of comment made on the post (Enhancement, Hatred, Spam, Uplifting, Improvement, Best, etc.)
> 10. **Rating** - Rating System for every post, A cummulative average rating is calculated.

<br>

## Project Information
[![Language Used](https://img.shields.io/badge/FrontEnd-HTML,%20CSS,%20JavaScript,%20TypeScript,%20JQuery-blue)](https://github.com/hariketsheth/Article_Repository_Management_System)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
[![Build](https://img.shields.io/badge/build-passing-green)](https://github.com/hariketsheth/Article_Repository_Management_System)

[![Language Used](https://img.shields.io/badge/Backend-JavaScript,%20PHP,%20MySQL-red)](https://github.com/hariketsheth/Article_Repository_Management_System)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<br>

## Instructions for Cloning this Repository Locally
- Use the command: `git clone https://github.com/hariketsheth/Article_Repository_Management_System`
- Take the database file named: `arms.sql` in the Database folder
- Go to phpMyAdmin
- Create a Database, Click on `Import` and upload `arms.sql`
- **If Project had to be run locally, using XAMPP**
  - In `connection.php`, Configure your database connection as following:
  ```php
  $con = mysqli_connect('localhost', 'root', '', 'YOUR_DATABASE_NAME');
  ```
