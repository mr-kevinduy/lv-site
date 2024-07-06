# Application

```sh
# Update .env
APP_URL=http://yourdomain.com
APP_VERSION=1.0.0

```

## Infra

| Target | Name | Value | AZ |
|---|---|---|
| VPC | demo_test_vpc | 10.99.0.0/16 | |
| Subnet | demo_test_sn_public_1 | 10.99.10.0/24 | ap-southeast-1a (apse1-az1) |
| Subnet | demo_test_sn_public_2 | 10.99.20.0/24 | ap-southeast-1b (apse1-az2) |
| Subnet | demo_test_sn_private_1 | 10.99.100.0/24 | ap-southeast-1a (apse1-az1) |
| Subnet | demo_test_sn_private_2 | 10.99.200.0/24 | ap-southeast-1b (apse1-az2) |

| Route tables | Routes | Subnet associations |
|---|---|---|
| demo_test_rtb_main | 10.99.0.0/16 - local | |
| demo_test_rtb_public | 10.99.0.0/16 - local, 0.0.0.0/0 - demo_test_igw | demo_test_sn_public_1, demo_test_sn_public_2 |
| demo_test_rtb_private | 10.99.0.0/16 - local | demo_test_sn_private_1, demo_test_sn_private_2 |

| Gateway | Name | VPC | Subnet |
|---|---|---|
| Internet gateway | demo_test_igw | demo_test_vpc | |
| NAT gateway | demo_test_ngw | demo_test_vpc | demo_test_sn_public_1 |

| EC2 | Private Ip | Public Ip | Subnet | Security groups |
|---|---|---|---|
| BastionServer | 10.99.10.248 | 54.255.245.196 | demo_test_sn_public_1 | demo-test-sg-bastion |
| WebServer | 10.99.100.107 | | demo_test_sn_private_1 | demo-test-sg-webserver |

| RDS | Type | Scheme | IPs | Security groups | Subnet | Endpoint |
|---|---|---|---|---|---|---|
| demo-test-elb-webserver | Classic | Internet-facing | 18.140.183.10, 18.140.171.156 | demo-test-sg-elb-webserver | demo_test_sn_public_1, demo_test_sn_public_2 | demo-test-elb-webserver-1980388060.ap-southeast-1.elb.amazonaws.com |

## Introduction
Demo laravel application.

***Docker***
- Laravel 11
- Composer version 2.7.2
- PHP version 8.2.18
- Node v20
- nginx/1.17.4
- Mysql 8

## Laravel Release Notes

| Version | PHP | Release |
|---|---|---|
| 11 | 8.2 - 8.3 | March 12th, 2024 |
| 12 | 8.2 - 8.3 | Q1 2025 |

## Requirements

### Laravel 11

- PHP >= 8.2
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- Filter PHP Extension
- Hash PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Session PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

### Testing

```sh
# SSH to Bastion
chmod 400 "demo_key.pem"
ssh -i "demo_key.pem" ec2-user@10.99.100.107

# proxy 192.168.200.45
# 124.215.241.193

# no proxy
# 222.252.31.185

########### ping
# ping to EC2 (must allow Custom ICMP - IPv4 (config in secrity groups))
# ping to internet (Internet Gateway / Nat Gateway)
ping 10.99.10.248

# Check port is running (LISTEN)
netstat -tuplen

########### telnet & wget
# First will check security group.
# - telnet: Trying...
# - wget: Connecting to...

# apache is running & LISTEN :80
# - telnet: Connection refused
# - wget: failed: Connection refused.

########## Load Balancer
nslookup demo-test-elb-webserver-1980388060.ap-southeast-1.elb.amazonaws.com
# 18.140.183.10
# 18.140.171.156

# Change permission for file and folder of project is serving.
# Create a /index.html to Elastic Load Balancer Health check ping target EC2 instance => 'In-service'

curl "http://demo-test-elb-webserver-1980388060.ap-southeast-1.elb.amazonaws.com/"
curl -x "http://192.168.200.45:12080" "http://demo-test-elb-webserver-1980388060.ap-southeast-1.elb.amazonaws.com/"
curl -x "http://192.168.200.45:12080" "https://demo-test-elb-webserver-1980388060.ap-southeast-1.elb.amazonaws.com/" -k
```
