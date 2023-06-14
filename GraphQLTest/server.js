// const express = require('express');
// const { buildSchema } = require('graphql');
// const { graphqlHTTP } = require('express-graphql');
// const mysql = require('mysql2/promise');

// const app = express();

// const schema = buildSchema(`
//   type User {
//     user_id: Int
//     name: String
//   }

//   type Query {
//     getUsers: [User]
//     getUserById(id: Int!): User
//   }
// `);



// const root = {
//   getUsers: async () => {
//     const connection = await mysql.createPool({
//       host: 'localhost',
//       user: 'root',
//       password: '',
//       database: 'flowershop',
//     });
//     const [rows] = await connection.query('SELECT user_id, name FROM user');
//     return rows;
//   },
//   getUserById: async ({ id }) => {
//     const connection = await mysql.createPool({
//       host: 'localhost',
//       user: 'root',
//       password: '',
//       database: 'flowershop',
//     });
//     const [rows] = await connection.query('SELECT user_id, name FROM user WHERE user_id = ?', [id]);
//     return rows[0];
//   },
// };

// app.use(
//   '/graphql',
//   graphqlHTTP({
//     graphiql: true,
//     schema: schema,
//     rootValue: root,
//   })
// );

// app.listen(4000, () => console.log('Server is on port 4000'));

const express = require('express');
const { buildSchema } = require('graphql');
const { graphqlHTTP } = require('express-graphql');
const mysql = require('mysql2/promise');

const app = express();

// Define the schema
const schema = buildSchema(`
  type User {
    user_id: Int
    name: String
    email: String
  }

  type Query {
    getUserById(id: Int!): User
  }
`);

// Define the root resolver
const root = {
  getUserById: async ({ id }) => {
    const connection = await mysql.createConnection({
      host: 'localhost',
      user: 'root',
      password: '',
      database: 'flowershop',
    });
    const [rows] = await connection.query('SELECT user_id, name, email FROM user WHERE user_id = ?', [id]);
    return rows[0];  
  },
};

// Create the GraphQL server
app.use(
  '/graphql',
  graphqlHTTP({
    graphiql: true,
    schema: schema,
    rootValue: root,
  })
);

// Start the server
app.listen(4000, () => console.log('Server is running on port 4000'));

