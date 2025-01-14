# Dog Responses

*Dog Responses is a Laravel web application for searching, saving, editing, and deleting lists of HTTP status codes paired with dog images.*

## Technologies Used
- **Backend:** Laravel (PHP)
- **Database:** MySQL
- **Frontend:** Bootstrap, Blade Templates, CSS
- **Authentication:** Laravel Breeze

## Key Features
- **User Authentication:** Secure login and signup functionality.
- **Search Functionality:** Filter HTTP response codes and display corresponding dog images.
- **List Management:** Save search results as named lists, view saved lists, and perform edit or delete operations.
- **Editing Capabilities:** While editing a list, users can delete existing HTTP code items or add new ones.
- **Responsive Design:** Clean and responsive UI using Bootstrap.

## Usage
1. Register or log in to your account.
2. Use the search page to filter HTTP codes and view dog images.
3. Save filtered results as a new list.
4. Manage your lists by editing (adding/deleting HTTP codes) or deleting them.

## Installation & Setup

```bash
# Clone the repository
git clone https://github.com/your-username/dog-responses.git

# Navigate into the project directory
cd dog-responses

# Install dependencies
composer install
npm install

# Copy the environment file and set your configuration
cp .env.example .env
php artisan key:generate

# Configure .env with your database credentials and other settings

# Run migrations
php artisan migrate

# Start the development server
php artisan serve
