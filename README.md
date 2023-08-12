<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
## Introduce
calendarGpt is a unique web application that combines the power of a calendar with the power of GPT (Generative Pre-Trained Transformers) AI models. Built with Laravel, the app allows users to manage events, appointments, and reminders while leveraging AI to enhance the user experience.

## Installation
Clone the Repository: Clone the calendarGpt repository to your local machine.

Install Dependencies: Navigate to the project directory and run composer install to install the required PHP dependencies.

Configure Environment: Copy the .env.example file to .env and configure the database and other environment settings as needed. add open ai API key in the env file

Generate Key: Run php artisan key: generate to generate an application key.

database: link the database to your file

Start the Server: Run php artisan serve to start the local development server.

## Usage
Access the Application: Open your web browser and navigate to http://127.0.0.1:8000 (or the configured URL) to access the application.

Explore Features: Use the navigation menu and available options to explore the features of the application. Since the application follows Laravel's conventions, you can expect standard CRUD operations and other typical web application functionalities.

Manage Data: Utilize the provided interfaces to manage data, such as adding, editing, and deleting records.
## Feature
AI-Powered Event Descriptions: Leverage GPT models to generate detailed and creative descriptions of your events. Just provide a title or a few keywords and let AI craft a full description.

Smart Reminders: Set reminders for your events and receive personalized notifications crafted by artificial intelligence. Reminders can include relevant information, inspirational quotes, or anything else that suits your needs.

Event Analysis: Analyze your calendar events using artificial intelligence to gain insight into your schedule, find patterns and receive suggestions for improvement.

Natural Language Queries: Search and manage your calendars using natural language queries. Ask the AI to "show appointments for next week" or "reschedule my meeting with John to Friday".

Integrate with other services: Link your calendar with other platforms and services, and let artificial intelligence manage syncs, reminders, and more.

## GPT API integration
The app integrates with GPT API to provide artificial intelligence-driven features. Users may need to obtain an API key from the GPT provider and configure it in the application to enable these features.
