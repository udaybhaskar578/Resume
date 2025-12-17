# NameCheap DNS Configuration for udaymudivarty.me

## Step-by-Step Instructions

### 1. Remove Existing Records
In NameCheap Advanced DNS, **DELETE** any existing records for:
- Host: `@` (root domain)
- Types: A, AAAA, CNAME, ALIAS, or any other records

### 2. Add These 4 A Records
Add these **4 separate A records** (one at a time):

**Record 1:**
- Type: **A Record**
- Host: **@**
- Value: **185.199.108.153**
- TTL: **Automatic** (or 30 min)

**Record 2:**
- Type: **A Record**
- Host: **@**
- Value: **185.199.109.153**
- TTL: **Automatic** (or 30 min)

**Record 3:**
- Type: **A Record**
- Host: **@**
- Value: **185.199.110.153**
- TTL: **Automatic** (or 30 min)

**Record 4:**
- Type: **A Record**
- Host: **@**
- Value: **185.199.111.153**
- TTL: **Automatic** (or 30 min)

### 3. Optional: Add www Subdomain
If you want www.udaymudivarty.me to work:

- Type: **CNAME Record**
- Host: **www**
- Value: **udaybhaskar578.github.io**
- TTL: **Automatic**

### 4. Save Changes
Click **Save All Changes** in NameCheap

### 5. Verify in GitHub
1. Go to: https://github.com/udaybhaskar578/Resume/settings/pages
2. Under "Custom domain", ensure it shows: `udaymudivarty.me`
3. Wait 15-30 minutes for DNS to propagate
4. Check "Enforce HTTPS" once DNS is verified

### Current GitHub Pages IPs (as of 2025)
These are the current GitHub Pages IP addresses. If these don't work, check GitHub's documentation for the latest IPs:
- 185.199.108.153
- 185.199.109.153
- 185.199.110.153
- 185.199.111.153

