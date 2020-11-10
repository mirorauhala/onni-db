# API documentation

Over the years multiple endpoints have been built. They all differ from each
other in different ways. All endpoints are located on `/api/{version}/`.

| Version            | Description                                                             | Year |
|--------------------|-------------------------------------------------------------------------|------|
| [v1](./v1.md) | Created by the [Flying Spaghetti Monster](https://en.wikipedia.org/wiki/Flying_Spaghetti_Monster). *Usage is highly discouraged.* | 2005 |
| [v2](./v2.md) | Created for replacing v1 with a JSON response.                          | 2018 |
| [v3](./v3.md) | Created as the complete API covering the entire app.                    | 2019 |

### Rate-limiting

All requests count towards the rate-limit. Currently the rate-limiting is set
at 60 requests per minute. This quota is shared across all versions of the API.
The server returns the limit and the remaining quota in its headers.

```http
GET https://db.omaonni.fi/api/v3/questions

Status: 200 OK
X-RateLimit-Limit: 60
x-RateLimit-Remaining: 59
...
```
