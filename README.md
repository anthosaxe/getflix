# Failflix

Welcome to Failflix, a streaming platform inspired by popular services like Netflix and Amazon Prime Video. This project was created as a learning exercise to put our skills into practice by developing a full-stack web application. Our team of four junior developers worked on this project using a combination of PHP, HTML, CSS, JavaScript, and Docker to bring it to life.

Deploy URL: [getflix-project](http://64.227.71.83:8000/)

## Table of Contents

- [Mission Objectives](#mission-objectives)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [API Integration](#api-integration)
- [Team](#team)
- [Future Enhancements](#future-enhancements)
- [License](#license)

## Mission Objectives

The mission of this project was to consolidate everything we've learned so far in web development and to work together as a team and manage a full-stack application.

### Specific Objectives

1. **Develop a streaming site** using HTML/CSS, JavaScript, and PHP.
2. **Implement user authentication**: registration, login, and logout functionality.
3. **User roles**: Differentiate rights between regular users and administrators. For instance, registered users can comment on content, while admins have additional privileges.
4. **Search and filter capabilities**: Provide a search bar and filtering options for easy content discovery.
5. **Security**: Ensure the code is secure, with proper handling of user data and interactions.
6. **Deployment**: Deploy the site using free alternatives since PHP is not supported by GitHub.

## Features

- **User Authentication**: Registration, login, and logout functionality.
- **User Roles**: Different rights based on user roles (e.g., users can comment, admins have extra controls).
- **Search and Filters**: A search bar and filtering options to navigate through the movie catalog.
- **Movie Catalog**: Display of movie categories similar to popular streaming platforms.
- **API Integration**: Integration with The Movie Database (TMDb) API to fetch and display movie data.

## Technologies Used

- **Backend**: PHP, Docker
- **Frontend**: HTML, CSS, JavaScript
- **Database**: PHPMyAdmin (via Docker)
- **API**: TMDb API
- **Deployment**: Docker, with alternatives like Heroku (tried didn't work), Railway (tried didn't work), Render(tried didn't work), Digital Ocean for PHP deployment

## Installation

### Prerequisites

- Docker installed on your local machine.
- A TMDb API key (you can obtain this by creating an account on [The Movie Database](https://www.themoviedb.org/)).

### Steps

1. **Clone the repository**:
   ```bash
    git clone https://github.com/anthosaxe/getflix.git
    cd getflix
   ```

2. **Set up the environment**:
   - Create a `.env` file in the root directory.
   - Add your TMDb API key and other necessary environment variables.
   
3. **Build and run the Docker containers**:
   ```bash
   docker-compose up --build
   ```

4. **Access the site**:
   - Visit `http://localhost:8000` in your browser to see Getflix in action.

## Usage

Once the site is running, you can:

- **Register** as a new user or **log in** if you already have an account.
- **Browse** through the movie catalog and explore different categories.
- Use the **search bar** and **filters** to find specific movies or genres.
- **Comment** on movies if you're logged in as a registered user.
- **Admin users** can manage content and user comments.

## Project Structure

```
getflix/
│
├── source/                 # PHP backend files
├── source/                 # HTML, CSS, and JavaScript files
├── database/               # Database setup and migration files
├── docker-compose.yml      # Docker configuration
├── Dockerfile              # Docker environment
├── mysql-init              # Defaut database file
├── README.md               # Project documentation
└── ...                     # Other files and directories
```

## API Integration

We utilized **The Movie Database (TMDb) API** to fetch data for the movie catalog, including movie details, posters, and categories. This API provides a rich dataset that enhances the user experience by displaying accurate and up-to-date movie information.

## Team

- **Backend Developers**: 
  - D Anthony - [GitHub Profile](https://github.com/anthosaxe)
  - M Luan Patrick - [GitHub Profile](https://github.com/LuanPM284)
- **Frontend Developers**:
  - Tommy - [GitHub Profile](https://github.com/Mus1shi)
  - D Anthony - [GitHub Profile](https://github.com/anthosaxe)

## Future Enhancements

- Management of lost passwords.
- Back office for user and comment management (CRUD).
- Create a page or section that displays the top movies with the movie db API.
- Integrate a newsletter with Mailchimp.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
```
