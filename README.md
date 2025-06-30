# Art Gallery - Backend Development

## Overview

This is an Online Art Gallery web application where artists can showcase their artwork and users can browse, purchase, and manage art pieces. The frontend was based on a template from GitHub, allowing the development team to focus entirely on backend implementation and functionality.

## 🎯 Project Focus

This project emphasizes **backend development** with the following key areas:
- User authentication and authorization
- Product/artwork management system
- Shopping cart and checkout functionality
- Order processing and management
- Artist and user profile management
- Database design and optimization

## 🏗️ Backend Architecture

### Technology Stack
- **Backend Language**: PHP
- **Database**: MySQL
- **Web Server**: Apache/Nginx
- **Authentication**: Session-based with user roles
- **File Upload**: Image handling for artwork

### Core Backend Components

#### 1. Database Layer
- **Database Connection**: `connect.php` - Centralized database connectivity
- **Database Schema**: `database.php` - Database structure and initialization
- **User Management**: `User.php` - User entity and operations

#### 2. Authentication System
- **User Registration**: `sign-u.php` (User signup), `sign-a.php` (Artist signup)
- **User Login**: `login-u.php` (User login), `login-a.php` (Artist login)
- **Session Management**: Secure session handling with role-based access

#### 3. Product Management
- **Product Operations**: `addProd.php` - Add new artwork/products
- **Product Display**: `viewProd.php` - View product details
- **Product Editing**: `edit.php` - Edit product information
- **Product Deletion**: `delete.php` - Remove products from gallery

#### 4. Shopping & E-commerce
- **Shopping Cart**: `cart.php` - Cart management and operations
- **Checkout Process**: `checkout.php` - Order processing
- **Order Management**: `order.php` - Order tracking and management
- **Invoice Generation**: `invoice.php` - Invoice creation and display

#### 5. User Interface & Navigation
- **Main Gallery**: `browse.php` - Browse all available artwork
- **Artist Pages**: `artist.php` - Artist-specific galleries
- **User Profiles**: `profile.php` - User profile management
- **Contact System**: `contact.php` - Contact form handling

#### 6. Special Features
- **Virtual Gallery**: `v-wall.php`, `v-area.php` - Virtual gallery experience
- **E-Gift System**: `egift.php` - Electronic gift certificates
- **Advisor System**: `advisor.php`, `advisorPage.php` - Art advisory services

## 📁 Backend File Structure

```
Art-Gallery/
├── database/
│   └── [Database files and schemas]
├── uploads/
│   └── [Image uploads and media files]
├── User.php                 # User entity and operations
├── connect.php             # Database connection
├── database.php            # Database initialization
├── sign-u.php              # User registration
├── sign-a.php              # Artist registration
├── login-u.php             # User login
├── login-a.php             # Artist login
├── addProd.php             # Add products/artwork
├── viewProd.php            # View product details
├── edit.php                # Edit products
├── delete.php              # Delete products
├── cart.php                # Shopping cart
├── checkout.php            # Checkout process
├── order.php               # Order management
├── invoice.php             # Invoice generation
├── browse.php              # Browse gallery
├── artist.php              # Artist pages
├── profile.php             # User profiles
├── contact.php             # Contact system
├── v-wall.php              # Virtual wall
├── v-area.php              # Virtual area
├── egift.php               # E-gift system
├── advisor.php             # Advisor system
├── advisorPage.php         # Advisor pages
└── [Additional backend files]
```

## 🔐 Security Features

### Authentication & Authorization
- **Role-based Access Control**: Separate user and artist roles
- **Secure Password Handling**: Password hashing and validation
- **Session Management**: Secure session handling with timeout
- **Input Validation**: Server-side validation for all user inputs

### Data Protection
- **SQL Injection Prevention**: Prepared statements and parameterized queries
- **XSS Protection**: Input sanitization and output encoding
- **File Upload Security**: Validation of uploaded images and files
- **CSRF Protection**: Cross-site request forgery prevention

## 🗄️ Database Design

### Core Tables
- **Users**: User accounts and profiles
- **Artists**: Artist-specific information
- **Products**: Artwork and product details
- **Orders**: Order management and tracking
- **Cart**: Shopping cart functionality
- **Categories**: Product categorization

### Key Relationships
- Users can have multiple orders
- Artists can have multiple products
- Products belong to categories
- Orders contain multiple products

## 🚀 Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer (for dependency management)

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/rahmamohax/Art-Gallery.git
   cd Art-Gallery
   ```

2. **Database Setup**
   - Create a MySQL database
   - Import the database schema from `database/` directory
   - Configure database connection in `connect.php`

3. **Configuration**
   - Update database credentials in `connect.php`
   - Configure file upload paths in relevant files
   - Set up proper permissions for uploads directory

4. **Web Server Configuration**
   - Point web server to the project directory
   - Ensure PHP extensions are enabled (mysqli, gd, etc.)
   - Configure proper file permissions

## 🔧 Backend Development Highlights

### 1. Modular Architecture
- Separated concerns with dedicated files for each functionality
- Reusable components for common operations
- Clean separation between business logic and presentation

### 2. Scalable Design
- Database-driven content management
- Flexible product categorization system
- Extensible user role system

### 3. Performance Optimization
- Efficient database queries with proper indexing
- Image optimization for faster loading
- Caching strategies for frequently accessed data

### 4. Error Handling
- Comprehensive error logging
- User-friendly error messages
- Graceful degradation for system failures

## 🧪 Testing & Quality Assurance

### Backend Testing Areas
- **Authentication Testing**: Login/logout functionality
- **Database Operations**: CRUD operations for all entities
- **File Upload Testing**: Image upload and validation
- **Security Testing**: Input validation and SQL injection prevention
- **Performance Testing**: Database query optimization

## 📊 API Endpoints (Conceptual)

While this is primarily a PHP-based application, the backend structure supports RESTful principles:

- `POST /auth/register` - User registration
- `POST /auth/login` - User authentication
- `GET /products` - Retrieve products
- `POST /products` - Add new product
- `PUT /products/{id}` - Update product
- `DELETE /products/{id}` - Delete product
- `GET /cart` - Get cart contents
- `POST /cart/add` - Add to cart
- `POST /orders` - Create order

## 🔄 Future Enhancements

### Planned Backend Improvements
- **API Development**: RESTful API for mobile applications
- **Microservices Architecture**: Service-oriented design
- **Advanced Search**: Elasticsearch integration
- **Payment Gateway**: Stripe/PayPal integration
- **Real-time Features**: WebSocket implementation
- **Analytics**: User behavior tracking and analytics

## 👥 Development Team

This project was developed by a team focused on backend development, utilizing a pre-existing frontend template to accelerate development and focus on core functionality.

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 🤝 Contributing

Contributions are welcome! Please focus on:
- Backend functionality improvements
- Security enhancements
- Performance optimizations
- Database design improvements
- API development


**Note**: This README focuses on the backend development aspects of the Art Gallery project. The frontend was based on a template to allow the development team to concentrate on implementing robust backend functionality, database design, and business logic. 
