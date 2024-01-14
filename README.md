This is the pokemon-api inspired on the Pokemon TCG Api.

Here's a summary of the Pokémon-API and its key features, based on the information you provided:

Account Management: 
    Allows users to create accounts and log in, providing a token for authentication.
    
Card Management:
    Create new cards.
    Update existing cards.
    Delete cards.
    
Card Viewing: 
    View cards created by other users.
    
Setup Instructions:
Clone the Repository: Download the project files from the repository.

Change 'FILESYSTEM_DISK':
    Locate the configuration file where 'FILESYSTEM_DISK' is defined.
    Change its value from 'local' to 'public'.
    
Run Migrations and Seeding:
    Open a terminal in the project directory.
    
Execute the command: 
    php artisan migrate:fresh --seed
    
Additional Information:
    Inspired by Pokémon TCG API: Suggests it shares similarities with the official Pokémon Trading Card Game API.
    Specific Functionalities: Explore the documentation or code to confirm its exact capabilities.
    
Potential Use Cases:
    Building Pokémon-themed web or mobile applications.
    Creating personal card collections or decks.
    Experimenting with card data and implementing game mechanics.
    
