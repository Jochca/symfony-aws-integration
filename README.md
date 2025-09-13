# ☁️ Symfony AWS Integration

A practical, modular Symfony project demonstrating how to integrate with AWS services step by step — starting with Docker and S3 (file uploads), and expanding to RDS, Lambda, Terraform and beyond.

---

## 📖 Table of Contents

- [✅ Features](#-features)
- [🔧 Project Structure](#-project-structure)
- [🐳 Local Setup (Docker)](#-local-setup-docker)
- [☁️ AWS: S3 Integration](#-aws-s3-integration)
- [🛠️ Upcoming: RDS Integration](#️-upcoming-rds-integration)
- [📌 Roadmap](#-roadmap)
- [📄 License](#-license)

---

## ✅ Features

- Modular Docker setup with PHP, PostgreSQL
- Symfony 6.4 initialized in `app/` directory
- S3 upload demo using Flysystem v3
- Clean Git history using [Conventional Commits](https://www.conventionalcommits.org/)
- Ready for AWS expansion (RDS, Lambda, etc.)

---

## 🔧 Project Structure

```bash
symfony-aws-integration/
├── app/               # Symfony 6.4 project root
├── docker/            # Docker configs (PHP, PostgreSQL, Nginx)
├── docker-compose.yml
└── README.md
```

---

## 🐳 Local Setup (Docker)

```bash
git clone git@github.com:your-username/symfony-aws-integration.git
cd symfony-aws-integration

# Build and start containers
docker compose up -d --build

# Install Symfony dependencies
docker compose exec php composer install
```

---

## ☁️ AWS: S3 Integration

### Prerequisites
- AWS account
- IAM user with S3 access
- Access Key & Secret

### Setup

1. Create a bucket (e.g. `symfony-aws-integration`)
2. Assign IAM policy:

```json
{
  "Version": "2012-10-17",
  "Statement": [
    {
      "Effect": "Allow",
      "Action": [
        "s3:PutObject",
        "s3:GetObject",
        "s3:DeleteObject",
        "s3:ListBucket"
      ],
      "Resource": [
        "arn:aws:s3:::symfony-aws-integration",
        "arn:aws:s3:::symfony-aws-integration/*"
      ]
    }
  ]
}
```

3. Add credentials to `.env.local`:

```dotenv
AWS_ACCESS_KEY_ID=xxx
AWS_SECRET_ACCESS_KEY=xxx
AWS_REGION=eu-central-1
AWS_BUCKET_NAME=symfony-aws-integration
```

4. Upload test (e.g. `/upload`)

---

## 🛠️ Upcoming: RDS Integration

This project is configured to use **Amazon RDS (PostgreSQL)** as its primary database in production.

- Database endpoint: `<your-rds-endpoint>.rds.amazonaws.com`
- Connection established via Symfony `DATABASE_URL`
- Verified via `bin/console doctrine:database:create` command
---

## 📌 Roadmap

- ✅ S3 integration via Flysystem
- 🔜 RDS (managed PostgreSQL)
- 🔜 AWS Lambda for async tasks
- 🔜 CI/CD (GitHub Actions → EC2/S3)
- 🔜 Terraform provisioning

----

## 📄 License

MIT
