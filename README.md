# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> The end of life date for PHP 7.4 was November 28, 2022.
> The end of life date for PHP 8.0 was November 26, 2023.
> If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> The end of life date for PHP 8.1 will be November 25, 2024.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library




# SETUP 
## ci4-first
## Setting Up CodeIgniter 4 with Composer, Apache NetBeans, and XAMPP

This guide will assist you in setting up a CodeIgniter 4 project using Composer for dependency management, along with Apache NetBeans and XAMPP for a comprehensive development environment.

## Prerequisites

Before proceeding, ensure you have the following installed:

- XAMPP: A free and open-source cross-platform web server solution stack package developed by Apache Friends.
- Apache NetBeans: An integrated development environment (IDE) for developing with PHP, HTML, JavaScript, and other web technologies.
- Composer: A dependency manager for PHP.

## Step 1: Install XAMPP

1. Download XAMPP(8.2.12 / PHP 8.2.12) from the [official website](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-windows-x64-8.2.12-0-VS16-installer.exe/download).
2. Follow the installation instructions for your operating system.


### Setup XAMPP/Enabling PHP Extensions in XAMPP

To ensure that your XAMPP environment is fully configured for CodeIgniter 4 development, you need to enable several PHP extensions. Follow the steps below to.

#### Step 1: Enable `intl` and `mbstring` Extension

1. Navigate to the `c:\\xampp\php` directory within your XAMPP installation folder.
2. Open the `php.ini` file using a text editor.
3. Uncomment the line `;extension=intl` by removing the semicolon (`;`) at the beginning of the line.
4. Uncomment the line `;extension=mbstring` by removing the semicolon (`;`) at the beginning of the line.
5. Save the `php.ini` file

#### Step 2: Check `json`, `xml`, `mysqlnd` extensions

1. Start apache server in xampp control panel
2. Navigate to `c:\\xampp\htdocs`
3. Create a `test.php` file and open it in a text editor
4. Write,
    <?php 
        echo phpinfo();
    ?>
5. Open a browser and enter  localhost/test.php
6. Search these extensions to check if they are enabled, generally they are enabled in this pHp 8 version,
    `json`, `xml`, `mysqlnd`
7. Make sure that they are enabled and stop apache server in xampp control panel

#### Step 3: Check/setup libssh2.dll file

1. Navigate to c://xampp/apache/bin and check libssh2.dll file
2. Make sure the file is present

After completing these steps, the required extensions will be enabled in your XAMPP PHP environment, allowing you to work seamlessly with your CodeIgniter 4 project.


## Step 2: Install Apache NetBeans

1. Download Apache NetBeans from the [official website](https://dlcdn.apache.org/netbeans/netbeans-installers/21/Apache-NetBeans-21-bin-windows-x64.exe).
2. Follow the installation instructions for your operating system.
3. Launch Apache NetBeans.

## Step 3: Install Composer

1. Download and install Composer from the [official website](https://getcomposer.org/Composer-Setup.exe).
2. Follow the installation instructions for your operating system.
3. Verify that Composer is installed by running `composer --version` in your terminal or command prompt.

## Step 4: Create a New CodeIgniter 4 Project

1. Open your terminal or command prompt.
2. Navigate to c://xampp/htdocs
3. Run the following Composer command to create a new CodeIgniter 4 project:
    composer create-project codeigniter4/appstarter ci4-first

## Step 5: Run the project

1. Start the Apache from the XAMPP Control Panel.
2. Open browser and enter `localhost/ci4-first/public/`
3. This should open a Welcome page showing codeigniter4

